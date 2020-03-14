#!C:\Users\ankiwoong\AppData\Local\Programs\Python\Python37\python.exe
import cgi
import os

form = cgi.FieldStorage()
pageId = form["pageId"].value
title = form["title"].value
description = form['description'].value

opened_file = open('data/'+pageId, 'w')
opened_file.write(description)
opened_file.close()

os.rename('data/'+pageId, 'data/'+title)

# Redirection
print("Location: index.py?id="+title)
print()
