def transpose(matriks):
    result = [[] for _ in range(len(matriks))]
    for i in range(len(matriks)):
        for j in range(len(matriks[i])):
            result[i].append(matriks[j][i])

    return result

list_input = [
                [1, 2, 3], 
                [1, 2, 3], 
                [1, 2, 3]
            ]       

hasil = transpose(list_input)

for i in hasil:
    print(i)