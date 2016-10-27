#include<iostream>
using namespace std;
int nhap(int *a,int n)
{
	int i;
	for(i=0;i<n;i++)
	{
		cout<<"phan tu thu "<<i<<":";
		cin>>*(a+i);
	}
}
int xuat(int *a,int n)
{   int i;
	for(int i=0;i<n;i++)
	{
		cout<<"  "<<*(a+i);
	}
}
int ucln(int a,int b)
{
	while(a!=b)
	{
		if(a>b) a=a-b;
		else b=b-a; 
	}
	return a;
}
int uclnday(int *a,int n)
{
	int i,k;
	k= ucln(a[0],a[1]);
	for (i=1;i<n;i++)
	{
		k=ucln(k,a[i]);
	}
	cout<<"\n Bai 1: a) Uoc chung lon nhat: "<<k;
}
int bcnn(int a,int b)
{
	int k;
	if(a==0) return 0;
	if(b==0) return 0;
	else k= (a*b)/ucln(a,b);
}
int bcnnday(int *a,int n)
{
	int j,i;
	j=bcnn(a[0],a[1]);
	for (i=1;i<n;i++)
	{
		j=bcnn(j,a[i]);
	}
	cout<<"\n b) Boi chung nho nhat la: "<<j;
}
int nguyento(int a)
{
	if(a<2) return 0;
	for(int i=2;i*i<=a;i++)
	if(a%i==0) return 0;
	return 1;
}
int nguyento_max_min(int *a,int n)
{
	int i,max,min,j=0,dem=0;
	int s[100];
	for(i=0;i<n;i++)
	{
		if(nguyento(*(a+i)==0)) dem=dem+1;
	}
	if(dem==n)
	cout<<"\n khong co so nguyen to trong mang \n";
	else
	{
		for(int i=1;i<=n;i++)
	{
		if(nguyento(*(a+i))==1)
		{
			s[j]=*(a+i);
			j++;
		} 
	}
   {
	    max=s[0]; min=s[0];
		for(i=1;i<j;i++)
		 {
		 	if (max<s[i]) 
			  max=s[i]; 
			if (min>s[i]) min=s[i] ; 
		 }
		cout<<"\n Bai2: a) So nguyen to lon nhat trong mang: "<<max<<"\n"; 
		cout<<"\n b) So nguyen to nho nhat trong mang: "<<min<<"\n";
	}
		}
	}
	int Max(int* a, int n)
	{
		int max=0;
		for(int i=1;i<n;i++)
		{
			if(*(a+max)<*(a+i))
			{
				max=i;
			}
		}
		return max;
	}
	int hoanvi(int* a, int* b)
	{
		int c=*a;
		*a=*b;
		*b=c;
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
	int sapxep(int* a, int n)
	{
		int m;
		int max;
		max=Max(a,n);
		m=n/2;
		hoanvi(a+m,a+max);
		sapxep(a,0,m-1,true);
		sapxep(a,m+1,n-1,false);
	}
	int giaithua(int a)
	{
		int i,s=1;
		if(a==0) return 1;
		else
		{
			for(i=1;i<=a;i++)
			{
				s=s*i;
			}
			return s;
		}
	}
	int tonggiaithuachan(int* a, int n)
	{
		int i,j,s=0;
		for(i=0;i<n;i++)
		{
			if(*(a+i)%2==0)
			{
				s=s+giaithua(*(a+i));
			}
		}
		cout<<"\n Bai 3: Tong giai thua chan la: "<<s<<endl;
	}
int main()
{
	int a[100],n;
	cout<<"NGUYEN QUANG DAT          LOP: 14CDT2";
	cout<<"\n ma SV: 101140178";
	cout<<"\n\n nhap n phan tu: ";
	cin>>n;
	nhap(a,n);
	cout<<"mang sau khi nhap la : ";
	xuat(a,n);
	cout<<endl;
	uclnday(a,n);
	cout<<endl;
	bcnnday(a,n);
	cout<<endl;
	nguyento_max_min(a,n);
	cout<<endl;
	tonggiaithuachan(a,n);
	cout<<endl;
	sapxep(a,n);
	cout<<endl;
	cout<<"Bai 4: Mang sau khi sap xep la : ";
	xuat(a,n);
	return 0;
}
