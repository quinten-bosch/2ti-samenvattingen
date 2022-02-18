from cgitb import reset
import win32clipboard
import time
import validators

import requests
from bs4 import BeautifulSoup

### Simple script that checks if there is a link in the clipboard
### Converts the link to markdown using the title of the page

while True:

    win32clipboard.OpenClipboard()
    data = win32clipboard.GetClipboardData()
    win32clipboard.CloseClipboard()

    if validators.url(data):
        print("valid")
        reqs = requests.get(data)
        soup = BeautifulSoup(reqs.text, 'html.parser')
        for title in soup.find_all('title'):
            pageTitle = title.get_text()
  
        result = f"[{pageTitle}]({data})"
        print(result)
        data = result
        win32clipboard.OpenClipboard()

        win32clipboard.EmptyClipboard()
        win32clipboard.SetClipboardText( result, win32clipboard.CF_TEXT )
        win32clipboard.CloseClipboard()

    else:
        print("invalid")

    time.sleep(0.5)