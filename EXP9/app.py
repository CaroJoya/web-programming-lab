from flask import Flask, render_template, request, redirect, url_for
import sqlite3

app = Flask(__name__)

def get_db():
    conn = sqlite3.connect('database.db')
    conn.row_factory = sqlite3.Row
    return conn

def init_db():
    conn = get_db()
    conn.execute('''
        CREATE TABLE IF NOT EXISTS profile (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            skill TEXT,
            hobby TEXT,
            goal TEXT,
            favorite_language TEXT,
            strength TEXT,
            favorite_food TEXT
        )
    ''')
    conn.commit()
    conn.close()
    
@app.route('/')
def home():
    return render_template("index.html")

@app.route('/submit', methods=['POST'])
def submit():
    name = request.form['name']
    skill = request.form['skill']
    hobby = request.form['hobby']
    goal = request.form['goal']
    favorite_language = request.form['favorite_language']
    strength = request.form['strength']
    favorite_food = request.form['favorite_food']
    
    conn = get_db()
    conn.execute('''
        INSERT INTO profile (name, skill, hobby, goal, favorite_language, strength, favorite_food)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ''', (name, skill, hobby, goal, favorite_language, strength, favorite_food))
    conn.commit()
    conn.close()
    
    return render_template("result.html", 
                         name=name, skill=skill, hobby=hobby, goal=goal,
                         favorite_language=favorite_language,
                         strength=strength, favorite_food=favorite_food)

@app.route('/view')
def view():
    search = request.args.get('search', '')
    conn = get_db()
    
    if search:
        data = conn.execute('''
            SELECT * FROM profile 
            WHERE name LIKE ? OR skill LIKE ? OR hobby LIKE ?
            ORDER BY id DESC
        ''', (f'%{search}%', f'%{search}%', f'%{search}%')).fetchall()
    else:
        data = conn.execute('SELECT * FROM profile ORDER BY id DESC').fetchall()
    
    conn.close()
    return render_template("view.html", data=data, total_count=len(data), search=search)

@app.route('/delete/<int:id>')
def delete(id):
    conn = get_db()
    conn.execute('DELETE FROM profile WHERE id = ?', (id,))
    conn.commit()
    conn.close()
    return redirect(url_for('view'))

@app.route('/edit/<int:id>')
def edit(id):
    conn = get_db()
    profile = conn.execute('SELECT * FROM profile WHERE id = ?', (id,)).fetchone()
    conn.close()
    return render_template("edit.html", profile=profile)

@app.route('/update/<int:id>', methods=['POST'])
def update(id):
    name = request.form['name']
    skill = request.form['skill']
    hobby = request.form['hobby']
    goal = request.form['goal']
    favorite_language = request.form['favorite_language']
    strength = request.form['strength']
    favorite_food = request.form['favorite_food']
    
    conn = get_db()
    conn.execute('''
        UPDATE profile 
        SET name=?, skill=?, hobby=?, goal=?, favorite_language=?, strength=?, favorite_food=?
        WHERE id=?
    ''', (name, skill, hobby, goal, favorite_language, strength, favorite_food, id))
    conn.commit()
    conn.close()
    return redirect(url_for('view'))

if __name__ == '__main__':
    init_db()
    app.run(debug=True)