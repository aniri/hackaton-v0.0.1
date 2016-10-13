import shlex, subprocess
import sys

f = open(sys.argv[1], 'rb') 

location = sys.argv[2]

for elem in f:
    if elem:
        print elem
        if location == "server":
        	command = "curl -k -X POST -d '%s' http://193.230.8.27:34337/check.json" % elem
        elif location == "localhost":
        	command = "curl -k -X POST -d '%s' localhost:1337/check.json" % elem
    	else:
    		print "invalid location"
    		break
        args = shlex.split(command)
        p = subprocess.Popen(args) 

