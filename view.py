import os
import html_sanitizer


def getList():
    sanitizer = html_sanitizer.Sanitizer()
    files = os.listdir('\\Bitnami\\wampstack-7.3.13-0\\apache2\\htdocs\\data')
    listStr = ''
    for item in files:
        item = sanitizer.sanitize(item)
        listStr = listStr + \
            '<li><a href="index.py?id={name}">{name}</a></li>'.format(
                name=item)
    return listStr
