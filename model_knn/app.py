from flask import Flask, render_template, request, session, redirect, flash
from flask_mysqldb import MySQL
from sklearn.preprocessing import LabelEncoder, MinMaxScaler
import numpy as np
import pandas as pd
import pickle
import uuid
import hashlib


app = Flask(__name__)
secret_key = str(uuid.uuid4())
app.secret_key = secret_key

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'simpelkpm_db'

mysql = MySQL(app)

with open('stunting5.pkl', 'rb') as file:
    knn = pickle.load(file)


@app.route('/')
def home():
    if 'username' in session:
        return render_template('beranda.html')
    else:
        return redirect('/login')


@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        hashed_password = hashlib.md5(password.encode()).hexdigest()

        # Mengecek kecocokan data pengguna dengan database
        conn = mysql.connection
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM tb_user WHERE username = %s AND password = %s", (username, hashed_password))
        user = cursor.fetchone()
        cursor.close()

        if user and user[3] == 'kpm':
            session['username'] = username
            session['status'] = user[3]
            return redirect('/user')
        elif user and user[3] == 'pegawai':
            session['username'] = username
            session['status'] = user[3]
            return redirect('/admin')
        elif user and user[3] == 'warga':
            session['username'] = username
            session['status'] = user[3]
            return redirect('/user')
        else:
            return render_template('login.html', error='Username dan password tidak sesuai!')


    return render_template('login.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        hashed_password = hashlib.md5(password.encode()).hexdigest()
        status = "warga"
        
        conn = mysql.connection
        cursor = conn.cursor()
        # Perintah SQL untuk menyimpan data registrasi ke database
        query = "INSERT INTO tb_user (username, password, status) VALUES (%s, %s, %s)"
        values = (username, hashed_password, status)
        cursor.execute(query, values)
        conn.commit()
        cursor.close()
        
        if True:
            flash('Akun berhasil dibuat. Silakan masuk.')
        else:
            flash('Terjadi kesalahan saat membuat akun.')
        return redirect('/login')
    
    return render_template('register.html')



@app.route('/logout')
def logout():
    session.pop('username', None)
    return redirect('/login')


@app.route('/predict', methods=['POST'])
def predict():
    global enc, scaler, knn
    if request.method == 'POST':
        nama = request.form['nama']
        kelurahan = request.form['kelurahan']
        umur = request.form['umur']
        tgl_input = request.form['tgl_input']
        tinggi_badan = float(request.form['tinggi_badan'])
        berat_badan = float(request.form['berat_badan'])
        jenis_kelamin = request.form['jenis_kelamin']
        
        # masukkan ke array
        data = {
            'Umur': [umur],
            'Tinggi Badan': [tinggi_badan],
            'Berat Badan': [berat_badan],
            'Jenis Kelamin': [jenis_kelamin]
        }
        df = pd.DataFrame(data)
        
        
        # Melakukan transformasi data
        enc = LabelEncoder()
        df.loc[:, ['Jenis Kelamin']] = \
        df.loc[:, ['Jenis Kelamin']].apply(enc.fit_transform)
        # feature_scale_new = [feature for feature in df.columns]
        # scaler = MinMaxScaler()
        # scaler.fit_transform(df[feature_scale_new])
        
        # data_new = pd.concat([
        #         pd.DataFrame(scaler.fit_transform(df[feature_scale_new]), columns=feature_scale_new)], axis=1)
        # transformed_data = transform_data(jenis_kelamin, tinggi_badan, umur)

        # Melakukan prediksi stunting menggunakan model KNN
        x = df.copy()
        prediksi = knn.predict(x)
        if prediksi == 'Stunting':
            prediksi = 'Stunting'
            nilai = 1 * 100
        elif prediksi == 'Non-Stunting':
            prediksi = 'Tidak Stunting'
            nilai = 0 * 100

    

        if 'username' in session:
            # Menyimpan data ke database
            conn = mysql.connection
            cursor = conn.cursor()
            query = "INSERT INTO tb_prediksi (nama, kelurahan, umur, tgl_input, tinggi_badan, berat_badan, jenis_kelamin, hasil) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
            values = (nama, kelurahan, umur, tgl_input, tinggi_badan, berat_badan, jenis_kelamin, prediksi)
            cursor.execute(query, values)
            conn.commit()
            cursor.close()

        return render_template('home.html', prediksi=prediksi, nilai=nilai)


@app.route('/admin')
def admin():
    if 'username' in session and session['username'] == 'admin':
        # Mengambil data dari database
        conn = mysql.connection
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM tb_prediksi")
        data = cursor.fetchall()
        cursor.close()

        return render_template('admin.html', data=data)

    return redirect('/login')

@app.route('/user')
def user():
    if 'username' in session:
        # Mengambil data dari database
        conn = mysql.connection
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM tb_prediksi")
        data = cursor.fetchall()
        cursor.close()

        return render_template('beranda.html', data=data)

    return redirect('/login')

@app.route('/homes')
def homes():
    return render_template('home.html')


if __name__ == '__main__':
    app.run(debug=True)
