#include<bits/stdc++.h>
using namespace std;
/*this is first program for calculating the factorial of limited no of value*/
/*This is another statement added to check "git checkout CommitName --file_name " is working or not.*/

int Fact(int n)
{
	if(n=1 || n==0) return 1;
	else n*fact(n-1);

}
int main(){
	int n;
	cin>>n; 
	cout<<Fact(n)
	return 0;
}
