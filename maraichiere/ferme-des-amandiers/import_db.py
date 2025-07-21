import mysql.connector

# Connexion à MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="admin"
)
cursor = conn.cursor()

# Création de la base de données
cursor.execute("CREATE DATABASE IF NOT EXISTS fermeDesAmandiers")
cursor.execute("USE fermeDesAmandiers")

# Lecture et exécution du script SQL
with open("fermedesamandiers.sql", "r", encoding="utf-8") as f:
    sql_commands = f.read().split(';')
    for command in sql_commands:
        command = command.strip()
        if command:
            try:
                cursor.execute(command)
            except Exception as e:
                print(f"Erreur lors de l'exécution : {command}\n{e}")

conn.commit()
cursor.close()
conn.close()
print("Base de données créée et initialisée avec succès.") 