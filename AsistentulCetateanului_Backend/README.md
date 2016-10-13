DATA MODEL
```
1. notifications:
	[
		{
		   "_id": "bee8ba05007cd13810fdc80c46001bec",
		   "_rev": "1-9f2490082ea3397c5730224bb9e8b1a4",
		   "type": "home",
		   "message": "In 25 ianuarie trebuie sa achitati impozitul pe cladiri",
		   "opts": {
		       "scope": "tax",
		       "amount": "200",
		       "deadline": "2016-01-25",
		       "discount_percent": "10",
		       "discount_deadline": "2016-01-15"
		   },
		   "channel": "sse"
		},
		{
		   "_id": "bee8ba05007cd13810fdc80c4600119d",
		   "_rev": "1-4105b0bea6a057d52779089409f59bd9",
		   "type": "custom",
		   "message": "Vezi de impozitul pe PFA",
		   "opts": {
		       "email": "hq@whitecitycode.com"
		   },
		   "channel": "email"
		},
		{
		   "_id": "bee8ba05007cd13810fdc80c46002926",
		   "_rev": "1-a56ca8890b1eeda2ccc257a4d1bf31d5",
		   "type": "home",
		   "message": "Asigurarea obligatorie de locuinta expira in curand",
		   "opts": {
		       "scope": "insurance",
		       "deadline": "2016-03-12",
		       "amount": "200",
		       "email": "hq@whitecitycode.com"
		   },
		   "channel": "email"
		},
		{
		   "_id": "bee8ba05007cd13810fdc80c46005316",
		   "_rev": "2-dba02c5e2ca3f5a68668c99882595887",
		   "type": "car",
		   "message": "RCA-ul masinii va expira",
		   "opts": {
		       "scope": "rca",
		       "deadline": "2016-05-01",
		       "vin": "RY45534",
		       "license_plate": "AB02DDR"
		   },
		   "channel": "sse"
		},
		{
		   "_id": "bee8ba05007cd13810fdc80c46006233",
		   "_rev": "1-ad8ef30a3fd05f4e6dadcd480b2f161c",
		   "type": "car",
		   "message": "ITP-ul masinii va expira",
		   "opts": {
		       "scope": "itp",
		       "deadline": "2016-05-01",
		       "vin": "RY45534",
		       "license_plate": "AB02DDR"
		   },
		   "channel": "sse"
		},
		{
		   "_id": "bee8ba05007cd13810fdc80c4600714d",
		   "_rev": "1-94f90262207c4007e64eabb352c3f197",
		   "type": "weather",
		   "message": "Cod galben de ninsori in zona dumneavoastra",
		   "opts": {
		       "address": "Alba Iulia, Alba, Romania",
		       "severity": "yellow"
		   },
		   "channel": "sse"
		}
	]

2. users:
	{
	   "_id": "bee8ba05007cd13810fdc80c460004ba",
	   "_rev": "3-83dbd6f452140b8c843fb6823b9a3b27",
	   "name": "Adrian",
	   "email": "hq@whitecitycode.com",
	   "pass": "cea-ceva",
	   "personal_info": {
	       "address": "Henri Coanda 2A, et. 1",
	       "ssn": "5850202055582"
	   },
	   "subscriptions": {
	       "home": [
		   {
		       "scope": "tax",
		       "channel": "email"
		   },
		   {
		       "scope": "insurance",
		       "channel": "sse"
		   }
	       ],
	       "car": [
		   {
		       "scope": "rca",
		       "vin": "EY3434FGH",
		       "license_plate": "AB22EYL"
		       "channel": "email"
		   },
		   {
		       "scope": "itp",
		       "vin": "RFD564654645",
		       "license_plate": "AB22DFG",
		       "channel": "email"
		   }
	       ],
	       "weather": [
		   {
		       "address": "Alba Iulia, Romania",
		       "channel": "sse"
		   },
		   {
		       "address": "Cluj, Romania",
		       "channel": "sse"
		   }
	       ],
	       "custom": [
		   {
		       "trigger_on": "2016-11-20 09:00",
		       "msg": "Plata taxa locala",
		       "channel": "email"
		   }
	       ]
	   }
	}



SAMPLE FILTER

{
   "by_id": "function(doc, req){ if (doc._id != req.query['_id']){ return false; }; return true; }"
}

curl --http1.0 -H "Content-Type: application/json" -H "Connection: keep-alive" "http://127.0.0.1:5985/baseball/_changes?feed=eventsource&filter=example/by_id&_id=e1b7fd89d283de769c7ed43a77001872"
```


