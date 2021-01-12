
def prediction():
    import pandas as pd
    import matplotlib.pyplot as plt
    from sklearn import linear_model
    data=pd.read_csv('data1.csv')
    #print(data)
    data.plot(kind='scatter',x='CGPA',y='Prob')
    #plt.show()
    data.plot(kind='box')
    #plt.show()
    data.corr()
    prob=pd.DataFrame(data['Prob'])
    cgpa=pd.DataFrame(data['CGPA'])
    #print(prob)
    lm=linear_model.LinearRegression()
    model=lm.fit(cgpa,prob)
    #print(model.coef_)
    model.intercept_
    model.score(cgpa,prob)
    #x=input()
    x=9
    z=[]
    z.append(x)
    X=(z)
    X=pd.DataFrame(X)
    Y=model.predict(X)
    print(Y[0][0])
    Y=pd.DataFrame(Y)
    df=pd.concat([X,Y], axis=1,keys=['cgpa_new','Predicted'])
    return Y[0][0]
if __name__ == "__main__":
    result = prediction()
    print(result)
    