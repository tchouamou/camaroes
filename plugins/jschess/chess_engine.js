M=I=P=N=q=K=J=Btime=0
Bt=1999
Al=-Bt
Ds=[10,-10]
BE=120
Rh=[]
G=[]
R=[]
KL=[3,3]
j=[0,1,5,3,3,9,63,0]
MV=[0,0,[1,10],[21,19,12,8],[11,9],[1,10,11,9],[1,10,11,9],0]
for(z=0;z<8;)
{

j[z+8]=j[z]<<=4
m=MV[z++]
if(m)
{

s=m.length
for(x=0;x<s;)
{

m[s+x]=-m[x++]
}
}
}
x='g00000000g'
y='gggggggggg'
b=y+y+"g23456432gg11111111g"+x+x+x+x+"g99999999ggABCDECBAg"+y+y
w=x+x+x+"000111100000123321000123553210"
a='000012346900'
Y=[]
PY=[]
bY=[]
for(y=0;y<12;y++)
{

for(x=0;x<10;x++)
{

z=(y*10)+x
PY[z]=parseInt(a.charAt(y))
bY[z]=parseInt(w.charAt((z<60)?z:119-z),35)&7
R[z]=parseInt(b.charAt(z),35)
}

}
R[BE]=0
d=document
A=E=d.all
if(!E)event=0
DM=d.getElementsByTagName||null
if(DM||E)
{

d.write('<img src="jschess/0.gif" id="PI" name="PI" width="32" height="30">')
A=(E||d.getElementsByTagName('img'))
Ic=A["PI"].style

}
cp=new Function('a','b','return b[0]-a[0]')


function func_Z(c,U,C,s,e,A,B,K)
{
var z=-1,C=-C,V=8-U,b=Al,r=R,S,E=r[e],g,d
if(C<-400)return[C,s,e]
r[e]=S=r[s]
r[s]=0
if(S)G[V][G[V].length]=[S,e]
if(S-U==1 && r[e+Ds[U>>3]]>15)
{
r[e]+=4
}
if(S-U==6&&(s-e==2||e-s==2))
{
g=s-4+(s<e)*7
d=(s+e)>>1
r[g]=0
r[d]=U+2
}
var L=func_PZ(U,K,C),N=L.length,n
if(N)
{
if(c)
{
L.sort(cp)
c--
var i=L[0],j=i[1],k=i[2],t
b=-func_Z(c,V,i[0],j,k,-B,-A,i[3])[0]
for(z=1;z<N;z++)
{
if(b>A)A=b
n=L[z]
t=-func_Z(c,V,n[0],n[1],n[2],-A-1,-A,n[3])[0]
if((t>A)&&(t<B))t=-func_Z(c,V,n[0],n[1],n[2],-B,-t,n[3])[0]
if(t>b)
{
b=t
j=n[1]
k=n[2]
if(t>A)A=t
if(b>B)
{
break
}

}

}

}
else
{
b=Al
while(--N&&B>b)
{
if(L[N][0]>b)
{
b=L[N][0]
}

}

}

}
else
{
func_fy(0)
}
if(g)
{
r[g]=U+2
r[d]=0
}
r[s]=S
r[e]=E
G[V].length--
return[b,j,k]
}



function func_Sf(c,U,s,e,K)
{
var E=R[e],S=R[e]=R[s]
R[s]=0
func_H()
U=func_Z(c,U,0,BE,BE,Al,Bt,K)
R[s]=S
R[e]=E
return U[0]
}



function func_mv(s,e,b)
{
var E=R[e],S=R[s],a=S&7,u=M>>3,c=0,t=0,z=0,p
if(M==P)
{
func_H()
p=func_PZ(M,K,0)
for(;z<p.length;z++)
{
t=t||(s==p[z][1]&&e==p[z][2])
}

if(!t)return 0
if(func_Sf(0,8-M,s,e,K)>400)return 0
}
if(func_Sf(0,M,s,e,K)>400)c=1
var x=s%10,g=e-s,D=Ds[u],t=e%10,n=1+(N>>1),l="abcdefgh"
func_Df((M?'     ':(n<10?" ":"")+n+".  ")+l.charAt(x-1)+((s-x)/10-1)+(E?'x':'-')+l.charAt(t-1)+((e-t)/10-1)+(c?'+':' '))
if(func_Sf(1,8-M,s,e,K)<-400)func_fy(c)
if((E&7)==6)
{

func_fy(1);return 0;

}
Rh[N]=[R.toString(),KL.toString(),K]
K=0
if(a==1)
{
if(R[e+D]>15)R[s]+=4-b
if(g==2*D&&(R[e-1]&1||R[e+1]&1))K=s+D
if(!E&&g%10)func_SH(e,e-D)
}
if(s==21+u*70||s==28+u*70)KL[u]&=(x<5)+1
if(e==21+u*70||e==28+u*70)KL[!u]&=(x<5)+1
if(a==6)
{
if(g*g==4)func_SH(s-4+(s<e)*7,s+g/2)
KL[u]=0
}
func_SH(s,e)
func_H()
N++
M=8-M
return 1
}



function func_fy(c){
func_Df(c?'checkmate!':'stalemate!')
J=c++
}


function func_H(){
var z=99,Q
s0=(N<32)?4-(N>>3):(N>64)
G[0]=[]
G[8]=[]
kY=[]
pY=[[],[]]
for(;z>20;z--)
{
a=R[z]
if(a&7)G[a&8][G[a&8].length]=[a,z]
Y[z]=bY[z]*s0
kY[z]=(N>40)||(10-2*bY[z])*s0
Q=pY[1][119-z]=pY[0][z]=PY[z]
if (N<7 && z>40)
{
pY[0][z]=pY[1][119-z]=Q+(Math.random()*Y[z])|1
Y[24]=Y[94]=29
}

}

}



function func_PZ(U,K,b){
var W,X,h,E,a,v,n,k=-1,u=U>>3,V=U^8,D=Ds[u],w=[],m,T,p=pY[u],H,d=KL[u],z,c,g,e=G[U],f=e.length,B=R,J=j
for (z=0;z<f;z++)
{
W=e[z][1]
a=B[W]
if (e[z][0]==a)
{
a&=7
if(a>1)
{
c=a==6
H=c?kY:Y
T=b-H[W]
n=MV[a]
if(a==3||c)
{
for(v=0;v<8;)
{
X=W+n[v++]
E=B[X]
if(!E||(E&24)==V)
{
w[++k]=[T+J[E]+H[X],W,X]
}

}
if(c&&d)
{
if(d&1&&!(B[W-1]+B[W-2]+B[W-3])&&func_CH(W-2,V,D,-1))w[++k]=[T+11,W,W-2]
if(d&2&&!(B[W+1]+B[W+2])&&func_CH(W,V,D,1))w[++k]=[T+12,W,W+2]
}

}
else
{
g=n.length
for(v=0;v<g;)
{
E=0
m=n[v++]
X=W
while(!E)
{
X+=m
E=B[X]
if(!E||(E&24)==V)
{
w[++k]=[T+J[E]+H[X],W,X]
}

}

}

}

}
else
{
T=b-p[W]
X=W+D
if(!B[X])
{
w[++k]=[T+p[X],W,X]
if(!p[W]&&(!B[X+D]))
{
w[++k]=[T+p[X+D],W,X+D,X]
}

}
if(K&&(K==X+1||K==X-1))w[++k]=[T+p[X],W,K]
for(h=X-1;h<X+2;h+=2)
{
E=B[h]+U
if(E&7&&E&8)
{
w[++k]=[T+J[E]+p[h],W,h]
}

}

}

}

}
return w
}



function func_CH(W,V,D,T)
{
var X,E,x,m,S=W+3,a=D+2,k=MV[3],B=R
for(;W<S;W++)
{
for(m=D-2;++m<a;)
{
E=B[W+m]
if(E&&(E&8)==V&&((E&8)==1||(E&7)==6))return 0
E=0
X=W
while(!E)
{
X+=m
E=B[X]
if((E==V+2+(m!=D)*2)||E==V+5)return 0
}

}
for(z=0;z<8;)if(B[W+k[z++]]-V==3)return 0
}
E=0
W-=3
while(!E)
{
W-=T
E=B[W]
if(E==V+2||E==V+5)return 0
}
return 1
}




function func_B(Q)
{
var a=R[Q],p='PI'
if(J)return
if(q==Q&&I)
{
func_O(p,0)
func_O(q,I,1)
I=0
return
}
if(a&&M==(a&8))
{
if(I)func_O(q,I,1)
I=a
q=Q
func_O(q,0,1)
func_O(p,a)
if(E)func_dr()
d.onmousemove=dr
return
}
if(I)
{
if(func_mv(q,Q,d.FF.h.selectedIndex,y))
{
func_O(p,0)
d.onmousemove=null
if(A)Ic.top=Ic.left='0px'
I=0
if(!J)
{
var t=func_Z((d.FF.i.selectedIndex+1),M,0,BE,BE,Al,Bt,K)
func_mv(t[1],t[2],0)
}

}

}

}



function func_SH(s,e)
{
var a=R[s]
R[e]=a
R[s]=0
func_O(s,0,1)
func_O(e,a,1)
}



function func_Df(x)
{
d.FF.b.value+='\n '+x
}



function func_Rf(a)
{
P=a
for(var z=0;z<BE;z++)if(R[z]<16)func_O(z,R[z],1)
if(P!=M)
{
Tt=func_Z((d.FF.i.selectedIndex+1),M,0,BE,BE,Al,Bt,K)
func_mv(Tt[1],Tt[2],0)
}

}



function func_Gb()
{
if(!N)return
N-=2
var b=Rh[N]
R=eval("["+b[0]+"]")
KL=eval("["+b[1]+"]")
func_Df(' --undo--')
K=b[2]
M=N%2
func_Rf(M)
func_H()
}


function func_dr(e)
{
e=e||event
Ic.left=(e.clientX+1)+'px'
Ic.top=(e.clientY-4)+'px'
}



function func_O(x,y,z)
{
if((A||x!='PI')&&z)x="i"+(P?119-x:x)
d.images[x].src='jschess/'+y+'.gif'
}
h='<table border="0" cellpadding="2" class="t">'
for(y=90;y>10;y-=10)
{
h+="<tr>"
for(x=0;x<10;x++)
{
z=y+x
if(x&&x<9)
{
h+=('<td class="'+(x+(y/10)&1?'b':'w')+'"><a href="#" onclick="func_B(P?119-'+z+':'+z+'); return false"><img src="jschess/0.gif" width="1" height="32" border="0"><img src="jschess/0.gif" width="32" height="30" name="i'+z+'" border="0"><img src="jschess/0.gif" width="1" height="32" border="0"></a></td>\n')
}

}
h+='</tr>\n'

}
h+='</table>'
d.write(h)
func_Rf(0)
