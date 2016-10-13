# https://github.com/jkbrzt/httpie#installation

http localhost:7337/v0.1/brasov/capabilities
http localhost:7337/v0.1/brasov/agency

http localhost:7337/v0.1/cities
http localhost:7337/v0.1/brasov/stops
http localhost:7337/v0.1/brasov/routes
http 'localhost:7337/v0.1/brasov/route?start_stop_id=TRIAJ&end_stop_id=LIVADA'
http 'localhost:7337/v0.1/brasov/route?start_stop_id=LIVADA&end_stop_id=TRIAJ'

http localhost:7337/v0.1/bucuresti/stops
http localhost:7337/v0.1/bucuresti/routes
http 'localhost:7337/v0.1/bucuresti/route?start_stop_id=0&end_stop_id=44'