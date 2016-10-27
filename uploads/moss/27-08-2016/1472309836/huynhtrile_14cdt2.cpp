#include <iostream>
using namespace std;

int A[100], n, i;
int Nhap(int *prt, int x)
	{
		for(i=0; i<x; i++)
		{
			cout<< "Phan tu thu "<<i<<":  ";
			cin>> *(prt+i);
		}
	}
int Xuat(int *prt, int x)
	{
		cout<< "Cac phan tu cua mang la:  ";
		for(i=0; i<x; i++)
			cout<<"  "<< *(prt+i);
	}	
	
	// BAI TAP 1:
	
int ucln(int a, int b)
	{
		if(a==b)
		return a;
			else if(a>b)
			     return ucln(a-b,b);
					else
					return ucln(a,b-a);
	}	
int UCLN(int *prt, int x)
	{
		if(x==1)
		return *(prt+0);
			else
			return ucln(prt[x-1], UCLN(prt, x-1));
	}
int bcnn(int a, int b)		
	{
		int B= a*b/ucln(a,b);
		return B;
	}
int BCNN(int *prt, int x)
	{
		if(x==1)
		return *(prt+0);
			else
			return bcnn(prt[x-1], BCNN(prt, x-1));
	}	
	
	// BAI TAP 2:

int snt(int m)									
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
 		else cout<< "\nKhong ton tai so nguyen to"<<endl;
	}

	// BAI TAP 3:
	
int sochan(int m)								
	{ 	int dem;
		(m%2==0)?dem=1:dem=0;
		return dem;
	}
int giaithua(int m)
	{ int gt=1;
	 for(int k=1;k<=m;k++) gt=gt*k;
	 return gt;
	}
int tonggiaithuachan(int *pa,int c)
    { 
		int tong=0;
		for(i=0;i<c;i++) 
		if(sochan(*(pa+i)))
	    tong=tong+giaithua(*(pa+i));
		cout<<"Tong giai thua chan la: "<<tong<<endl;
    }
	
	// BAI TAP 4:
	
int Max(int* prt, int x)
	{
		int max=0;
		for(int i=1;i<x;i++)
		{
			if(*(prt+max)<*(prt+i))
			max=i;
		}
		return max;
	}
int hoanvi(int *a, int *b)
	{
		int c=*a; *a=*b; *b=c;
	}
int sapxep(int* a, int b, int e, bool tf)
	{
		for( int i=b;i<=(e-1);i++)
		{
			for(int j=i+1;j<=e;j++)
			{
				if(tf==true)
				{
					if(*(a+i)>*(a+j))
					hoanvi(a+i,a+j);
				}
				else
				{
					if(*(a+i)<*(a+j))
					hoanvi(a+i,a+j);
				}
			}
		}
	}
int sapxep(int* prt, int x)
	{
		int m;
		int max;
		max=Max(A,n);
		m=n/2;
		hoanvi(A+m,A+max);
		sapxep(A,0,m-1,true);
		sapxep(A,m+1,n-1,false);
	}
	
int main()
	{ cout<<"HUYNH TRI LE          LOP: 14CDT2";
	  cout<<"\nMSSV: 101140188";
	  cout << "\n\nNhap so phan tu cua mang: ";
	  cin >> n;
	  Nhap(A,n);
	  Xuat(A,n);
	  cout<<endl<<"\nBai tap 1:"<<endl;
	  cout<<"UCLN cua day la: "<<UCLN(A,n)<<endl;
	  cout<<"BCNN cua day la: "<<BCNN(A,n)<<endl;
	  cout<<endl<<"Bai tap 2:";
	  sntmin(A,n);
	  cout<<"\nBai tap so 3:"<<endl;
	  tonggiaithuachan(A,n);
	  sapxep(A,n);
	  cout<<endl<<"Bai tap 4: \nMang sau khi sap xep la: "<<endl;
	  Xuat(A,n);
	  cout<<endl;
	  system("pause");
	  return 0;
	  
	}

