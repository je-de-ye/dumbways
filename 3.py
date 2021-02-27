teks = 'DUMBWAYSIDUJIAN'
maks = len(teks)
jml = maks
index = 0
for i in range(0,jml):
    for j in range(0,jml-1):
        print(' ',end="")

    for k in range(0,i+1):
        if(index != maks):
            print(str(teks[index])+" ",end="")
        index+=1
    
    jml-=1
    print("")

    if(index == maks):
        break