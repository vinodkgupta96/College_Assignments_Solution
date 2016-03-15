#include<iostream>
#include<fstream>
#include<map>
#include<string>
#include<math.h>
#define piby2 1.5708
using namespace std;
int main(int argc,char * argv[])
{
  fstream ifile,ofile;
  ifile.open(argv[1],ios::in);
  ofile.open(argv[2],ios::in);
  string s;
  int cnt1=0,cnt2=0;
  map <string,int> m,m1,m2;
  while(ifile>>s)
  {
    m[s]=0;
     m1[s]++;
     cnt1++;
     // cout<<s<<"\n";
  }
  while(ofile>>s)
  {
    m[s]=0;
     m2[s]++;
     cnt2++;
     //   cout<<s<<"\n";
  }
  double dot=0,mod1=0,mod2=0,costheta=0;
  
  map<string,int> :: iterator it;
  for(it=m.begin();it!=m.end();it++)
   {
     
     //      cout<<it->first<<"   "<<m1[it->first]<<"   "<<m2[it->first]<<"\n";
     double a,b;
     a=m1[it->first];
     b=m2[it->first];
     dot+=a*b;
     mod1+=(a*a);
     mod2+=(b*b);
     // cout<<dot<<"\n";
   }
  costheta=dot/(sqrt(mod1)*sqrt(mod2));
  // cout<<costheta<<"  "<<mod1<<"  "<<mod2<<"\n";
  // cout<<"Similarity score is = "<<"  "<<acos(costheta)<<"  "<<1-acos(costheta)/piby2<<"\n";
  //cout<<"Similarity score is = "<<1-acos(costheta)/piby2<<"\n";
  cout<<"                                                                "<<endl;
  cout<<"                       Results Are                              "<<endl;
   cout<<"                                                                "<<endl;
  cout << "words in doc 1 : " << cnt1 << "  Words in doc2 : " << cnt2 << "\n";
  cout << "Similarity between documents is :" <<100- acos(costheta)*100<<"%" << "\n";
    cout<<"                                                                "<<endl;
  cout<<endl;
  return 0;
}
