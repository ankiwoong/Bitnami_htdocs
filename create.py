#!C:\Users\ankiwoong\AppData\Local\Programs\Python\Python37\python.exe
import cgi
import os
print("content-type: text/html; charset-utf-8\n")
print()

files = os.listdir('\\Bitnami\\wampstack-7.3.13-0\\apache2\\htdocs\\data')
listStr = ''

for item in files:
    listStr = listStr + \
        '<li><a href="index.py?id={name}">{name}</a></li>'.format(name=item)

form = cgi.FieldStorage()
if 'id' in form:
    pageId = form["id"].value
    description = open('data/'+pageId, 'r').read()
else:
    pageId = 'Welcome'
    description = 'Hello, web'
print('''<!doctype html>
<html>
<head>
  <title>WEB1 - Welcome</title>
  <meta charset="utf-8">
</head>
<body>
  <h1><a href="index.py">WEB</a></h1>
  <ol>
    {listStr}
  </ol>
  <a href="create.py">create</a>
  <form action="process_create.py" method="post">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea rows="4" name="description" placeholder="description"></textarea></p>
      <p><input type="submit"></p>
  </form>
</body>
</html>
'''.format(title=pageId, desc=description, listStr=listStr))
