#!C:\Users\ankiwoong\AppData\Local\Programs\Python\Python37\python.exe
import cgi
import os
print("content-type: text/html; charset-cp949\n")
print()

files = os.listdir('\\Bitnami\\wampstack-7.3.13-0\\apache2\\htdocs\\web')
listStr = ''

for item in files:
    listStr = listStr + \
        '<li><a href="index.py?id={name}">{name}</a></li>'.format(name=item)

form = cgi.FieldStorage()

if 'id' in form:
    pageId = form["id"].value
    description = open('web/'+pageId, 'r').read()
else:
    pageId = 'Welcome'
    description = 'Hello, Web'

print('''
<!DOCTYPE html>
<html>
  <head>
    <title>WEB1 - Welcome</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><a href="index.py">WEB</a></h1>
    <ol>
      {listStr}
    </ol>
    <h2>{title}</h2>
    <p>{desc}</p>
  </body>
</html>
'''.format(title=pageId, desc=description, listStr=listStr))
