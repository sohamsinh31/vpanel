import sys

with open(sys.argv[1],'a') as fh:
    fh.write("\n hi")
    
with open(sys.argv[1],'r') as fh:
    print(fh.read())