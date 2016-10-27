#include <iostream>
using namespace std;

int A[100],n,i;
int nhapday(int *pa,int m)
	 {
	for (i=0; i<m; i++)
	 	{ cout <<"moi nhap vao phan tu thu "<<i<<" :";
	   		cin >> *(pa+i);
   	    }
 	 }
int xuatday(int *pa,int m)  
 
	 {
    	cout <<"ban da nhap vao day sau: ";
		for (i=0; i<m; i++) cout << "   " << *(pa+i);
	 }
int UCLN(int a, int b) 							//CAC HAM CUA BAI TAM SO 1
	{
		if(a==b)
		return a;
			else  if(a>b)
				  return UCLN(a-b,b);
					else
					return UCLN(a,b -a);
	}
	
int ucln(int *pa, int m) 
	{
		if(m==1)
		return *(pa+0);
			else
			return UCLN(pa[m-1],ucln(pa,m-1));
	}
	
int BCNN(int a, int b)
	{
		int B= a*b/UCLN(a,b);
		return B;
	}
	
int bcnn(int *pa,int m)
	{

		if(m==1)
 		return *(pa+0);
 			else
 			return BCNN(pa[m-1],bcnn(pa,m-1));
	}
	
int snt(int m)										//CAC HAM CUA BAI TAP SO 2
	{
		int k,dem=0;
		for (k=1;k<=m;k++)
			if (m%k==0) dem++;
			return (dem==2)?1:0;
	 
	}
	
int sntmin(int *pa, int m)
	{
		int max=0,min=32767;
		for (i=0;i<m;i++)
		if (snt(*(pa+i)))
			{ if (*(pa+i)>max) max=*(pa+i);}
		for (i=0;i<m;i++)
			if (snt(*(pa+i))){ if (*(pa+i)<min) min=*(pa+i);}
		if (max!=0 && min!=32767)
			{cout<<endl<<"So nguyen to lon nhat la: "<<max<<endl; cout<<"So nguyento be nhat la: "<<min<<endl;}
 		else cout<< "khong ton tai so nguyen to"<<endl;
	}
int sochan(int m)								//CAC HAM CUA BAI TAP SO 3
	{ 	int dem;
		(m%2==0)?dem=1:dem=0;
		return dem;
	}
int giaithua(int m)
	{ int gt=1;
	 for(int k=1;k<=m;k++) gt=gt*k;
	 return gt;
	}
int tonggiaithua(int *pa,int c)
    { 
		int tong=0;
		for(i=0;i<c;i++) 
		if(sochan(*(pa+i)))
	    tong=tong+giaithua(*(pa+i));
		cout<<"tong giai thua chan: "<<tong<<endl;
    }	

int main()
{ cout << "nhap so phan tu cua mang: ";
  cin >> n;
  nhapday(A,n);
  xuatday(A,n);
  cout<<endl<<"Bai tap so 1:";
  cout<<endl;
  cout <<"UCLN cua day la: "<<ucln(A,n)<<endl;
  cout<<"BCNN cua day la: "<<bcnn(A,n)<<endl;
  cout<<endl<<"Bai tap so 2:";
  sntmin(A,n);
  cout<<endl<<"Bai tap so 3:"<<endl;
  tonggiaithua(A,n);
  return 0;
}

