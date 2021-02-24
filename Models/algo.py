
 
def mamerina (value, nomena) :
    sorted (value)
    result =[]
    for i in range (0,len(value)):

        if i == len(value)-1:
            valiny = nomena // value [i]
            modulo = nomena % value [i]
            if (modulo > 0 ) :
                result = False
            elif (modulo == 0):
                result.append(valiny)
            
        else :
            valiny = nomena // value [i]
            modulo = nomena  % value [i]
            nomena = modulo
            result.append(valiny)
    return result
def occurence (caractere, mot):
    occurence =0 
    for i  in mot :
        if i == caractere :
            occurence = occurence + 1
    return occurence
def twin (mot1, mot2):
    result = False
    for i in mot1:
        if (len(mot1)!=len(mot2)):
            result = False
        elif occurence (i,mot1)== occurence (i,mot1):
            result = True
            continue
        else :
            result = False
            break   
    return result


print(twin("raraka", 'rkaaa'))