#!C:\Users\ankiwoong\AppData\Local\Programs\Python\Python37\python.exe
import cgi
print("content-type: text/html; charset-utf-8\n")
print()

pageID = 'Welcome'

print('''
<!DOCTYPE html>
<html>
  <head>
    <title>WEB1 - Welcome</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <h1><a href="http://localhost/web/index_no_id.py">WEB</a></h1>
    <ol>
      <li><a href="http://localhost/web/index.py?id=HTML">HTML</li></a> 
      <li><a href="http://localhost/web/index.py?id=CSS">CSS</li></a> 
      <li><a href="http://localhost/web/index.py?id=JavaScript">JavaScript</li></a> 
    </ol>
    <h2>{title}</h2>
    <p>
      WEB is a computer programming system created by Donald E. Knuth as the first implementation of what he called "literate programming": the idea that one could create software as works of literature, by embedding source code inside descriptive text, rather than the reverse (as is common practice in most programming languages), in an order that is convenient for exposition to human readers, rather than in the order demanded by the compiler.
      WEB consists of two secondary programs: TANGLE, which produces compilable Pascal code from the source texts, and WEAVE, which produces nicely-formatted, printable documentation using TeX.
    </p>
    <img src="http://localhost/img/2.png" width="100%" />
    <p style="margin-top:45px;">
      CWEB is a version of WEB for the C programming language, while noweb is a separate literate programming tool, which is inspired by WEB (as reflected in the name) and which is language agnostic.
    </p>
    <p>
      <iframe width="560" height="315" src="https:/www.youtube.com/embed/uQdCL5y4KQU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </p>
  </body>
</html>
'''.format(title=pageID))
