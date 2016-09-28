
<!-- saved from url=(0080)https://ajaxmmo.googlecode.com/svn-history/r5/trunk/image2json/src/image2json.py -->
<html><meta style="visibility: hidden !important; display: block !important; width: 0px !important; height: 0px !important; border-style: none !important;"><embed id="__IDM__" type="application/x-idm-downloader" width="1" height="1" style="visibility: hidden !important; display: block !important; width: 1px !important; height: 1px !important; border-style: none !important; position: absolute !important; top: 0px !important; left: 0px !important;"></meta><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">from PIL import Image

im = Image.open("genesis.png")
#im.mode = "L"
pix = im.load()

size = im.size

firstnode = True
id = 0
json = ""

f=open('terrain.json', 'a')

for x in range(0, size[0]):
   for y in range(0, size[1]):
       id = id + 1
       if firstnode == False:
           json = json + ","
       json = json + "{"
       json = json + "x:'" + str(x) + "',"
       json = json + "y:'" + str(y) + "',"
       json = json + "height:" + str(pix[x,y]) + "',"
       json = json + "id:'" + str(id) + "'"
       json = json + "}"
       firstnode = False
       f.write(json)

    
</pre></body></html>