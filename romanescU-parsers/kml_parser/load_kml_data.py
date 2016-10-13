from geopy.geocoders import Nominatim
from pykml import parser
from time import sleep
import hashlib

# Init mLab connection
from pymongo import MongoClient
client = MongoClient("mongodb://ds053176.mlab.com:53176/romanescu")
markers = client.romanescu.markers

# Parse kml file
root = parser.fromstring(open('medici_romani.kml').read())
geolocator = Nominatim()


def hash_not_seen(item_hash):
    """Helper: Don't insert duplicates in mongo"""
    return not markers.find_one({"hash": item_hash})


def get_location(address):
    """Helper: we will use this in a hack to double our chanches for inverse geocoding"""
    return geolocator.geocode(address)

for item in root.Document.iterchildren():
    if hasattr(item, 'address'):
        item_name = item.name + u''
        item_hash = hashlib.sha224(item_name.encode('utf-8')).hexdigest()
        if hash_not_seen(item_hash):
            try:
                location = get_location(item.address)
            except:
                """try again, maybe we are lucky"""
                location = get_location(item.address)
            if not location:
                continue
            print item.name + u''
            print item.description + u''
            print location.latitude, location.longitude
            markers.insert_one({
                'name': item.name + u'',
                'description': item.description + u'',
                'location': [location.latitude, location.longitude],
                'hash': item_hash
            })
            sleep(0.5)

