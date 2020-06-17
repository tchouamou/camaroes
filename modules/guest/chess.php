<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * chess.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























chess.php,Ver 3.0  2011-Sep-Wed 12:32:30  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

$division->module["name"] = $cmr->module["name"]; 




$division->module["title"] = $cmr->translate($cmr->module["base_name"]);
// $division->module["text"] = "";


















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/guest/chess.php", 1);
$lk->add_link("modules/guest/color.php", 1);
print($lk->open_module_tab(0));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($cmr->module["base_name"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="chess_div">
<!--link rel="stylesheet" href="jschess/chess_6k.css" type="text/css" /-->
 <style type="text/css">
body {
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
	
    background-color: #F6FBEC;
	color: black;
	font-family: Verdana, "Lucida Grande", Tahoma, Helvetica;
	font-size: small;
}

a {
	color: #981900;
}

.g {
	background-color: #ddd;
}

.w {
	background-color: #F8F5DF;
}

.b {
	background-color: #C3A480;
}

.h {
	background-color: #eec;
}

.t {
	background: white;
}

#PI {
	position: absolute;
	left: 100px;
	top: 20px;
}

form {
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;	
}

textarea {
	background: #EDEBDB;
	border: 0px;
	height: 304px;
}

.mainTable {
	margin-top: 10px;
	border-width: 5px;
	border-color: #CDB287;
	border-style: solid;
}

button, select {
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 5px;
	background-color: #F4EEC3;
	
	border-width: 3px;
	border-color: #CDB287;
	border-style: solid;
}

button {
    cursor: pointer;
    cursor: hand;
}

select {
	margin-right: 5px;
	background-color: #F5F2DC;
}

.controlBar {
	background-color: #CEDCB1;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 5px;
	padding-right: 5px;
	
	text-align: center;
}

.controlBarUpper {
	height: 45px;

	background-color: #CEDCB1;
	background-image: url('jschess/top_background.png');
	background-repeat: no-repeat;
	background-position: top right;
	
	text-align: left;
}

.controlBarBottom {
	height: 45px;
	
	background-image: url('jschess/bottom_background.png');
	background-repeat: no-repeat;
	background-position: bottom right;
}

.buttonBarUpper {
	text-align: left;
}

#tableAbout {
	display: none;
	background-color: #EAF3D7;
	
	border-width: 0px;
	border-top-width: 5px;
	border-bottom-width: 5px;
	border-color: #CDB287;
	border-style: solid;
}

#aboutCell {
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 10px;
	padding-right: 10px;
}
 </style>
<!--script src="jschess/fancy_chess_6k.js" type="text/javascript"></script-->
<script language="javascript" type="text/javascript">
function about(){
	if(document.getElementById('tableAbout').style.display == 'block'){
		document.getElementById('tableAbout').style.display = 'none';
	}else{
		document.getElementById('tableAbout').style.display = 'block';
	}
};
</script>

</head>
<body onload="H()">
	<form name="FF" method="post" action="index.php">
		<table border="0" cellspacing="2" align="center" class="mainTable">
		<tbody>
		<tr>
			<td colspan="2" class="controlBar controlBarUpper">
				<table width="100%"><tr>
				<td class="buttonBarUpper">
					<button onclick="window.location.href='jschess/index.php'">&nbsp;new game&nbsp;</button>
					<button onclick="Gb(); return false;">&nbsp;undo&nbsp;</button>
					<button onclick="Rf(8-P); return false;">&nbsp;swap&nbsp;</button><br/>
				</td>
				<td>
					<button onclick="about(); return false;">&nbsp;?&nbsp;</button>
				</td>
				</tr></table>
			</td>
		</tr>
		<tr>
			<td>
				<!--script src="jschess/chess_6k.js"></script-->
<script language="javascript" type="text/javascript">
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
for(z=0;z<8;){j[z+8]=j[z]<<=4
m=MV[z++]
if(m){s=m.length
for(x=0;x<s;){m[s+x]=-m[x++]}}}
x='g00000000g'
y='gggggggggg'
b=y+y+"g23456432gg11111111g"+x+x+x+x+"g99999999ggABCDECBAg"+y+y
w=x+x+x+"000111100000123321000123553210"
a='000012346900'
Y=[]
PY=[]
bY=[]
for(y=0;y<12;y++){for(x=0;x<10;x++){z=(y*10)+x
PY[z]=parseInt(a.charAt(y))
bY[z]=parseInt(w.charAt((z<60)?z:119-z),35)&7
R[z]=parseInt(b.charAt(z),35)}}R[BE]=0
d=document
A=E=d.all
if(!E)event=0
DM=d.getElementsByTagName||null
if(DM||E){d.write('<img src="jschess/0.gif" id="PI" name="PI" width="32" height="30">')
A=(E||d.getElementsByTagName('img'))
Ic=A["PI"].style}cp=new Function('a','b','return b[0]-a[0]')
function Z(c,U,C,s,e,A,B,K){var z=-1,C=-C,V=8-U,b=Al,r=R,S,E=r[e],g,d
if(C<-400)return[C,s,e]
r[e]=S=r[s]
r[s]=0
if(S)G[V][G[V].length]=[S,e]
if(S-U==1 && r[e+Ds[U>>3]]>15){r[e]+=4}if(S-U==6&&(s-e==2||e-s==2)){g=s-4+(s<e)*7
d=(s+e)>>1
r[g]=0
r[d]=U+2}var L=Pz(U,K,C),N=L.length,n
if(N){if(c){L.sort(cp)
c--
var i=L[0],j=i[1],k=i[2],t
b=-Z(c,V,i[0],j,k,-B,-A,i[3])[0]
for(z=1;z<N;z++){if(b>A)A=b
n=L[z]
t=-Z(c,V,n[0],n[1],n[2],-A-1,-A,n[3])[0]
if((t>A)&&(t<B))t=-Z(c,V,n[0],n[1],n[2],-B,-t,n[3])[0]
if(t>b){b=t
j=n[1]
k=n[2]
if(t>A)A=t
if(b>B){break}}}}else{b=Al
while(--N&&B>b){if(L[N][0]>b){b=L[N][0]}}}}else{fy(0)}if(g){r[g]=U+2
r[d]=0}r[s]=S
r[e]=E
G[V].length--
return[b,j,k]}
function Sf(c,U,s,e,K){var E=R[e],S=R[e]=R[s]
R[s]=0
H()
U=Z(c,U,0,BE,BE,Al,Bt,K)
R[s]=S
R[e]=E
return U[0]}
function mv(s,e,b){var E=R[e],S=R[s],a=S&7,u=M>>3,c=0,t=0,z=0,p
if(M==P){H()
p=Pz(M,K,0)
for(;z<p.length;z++){t=t||(s==p[z][1]&&e==p[z][2])}
if(!t)return 0
if(Sf(0,8-M,s,e,K)>400)return 0}if(Sf(0,M,s,e,K)>400)c=1
var x=s%10,g=e-s,D=Ds[u],t=e%10,n=1+(N>>1),l="abcdefgh"
Df((M?'     ':(n<10?" ":"")+n+".  ")+l.charAt(x-1)+((s-x)/10-1)+(E?'x':'-')+l.charAt(t-1)+((e-t)/10-1)+(c?'+':' '))
if(Sf(1,8-M,s,e,K)<-400)fy(c)
if((E&7)==6){fy(1);return 0;}Rh[N]=[R.toString(),KL.toString(),K]
K=0
if(a==1){if(R[e+D]>15)R[s]+=4-b
if(g==2*D&&(R[e-1]&1||R[e+1]&1))K=s+D
if(!E&&g%10)Sh(e,e-D)}if(s==21+u*70||s==28+u*70)KL[u]&=(x<5)+1
if(e==21+u*70||e==28+u*70)KL[!u]&=(x<5)+1
if(a==6){if(g*g==4)Sh(s-4+(s<e)*7,s+g/2)
KL[u]=0}Sh(s,e)
H()
N++
M=8-M
return 1}
function fy(c){Df(c?'checkmate!':'stalemate!')
J=c++
}
function H(){
var z=99,Q
s0=(N<32)?4-(N>>3):(N>64)
G[0]=[]
G[8]=[]
kY=[]
pY=[[],[]]
for(;z>20;z--){a=R[z]
if(a&7)G[a&8][G[a&8].length]=[a,z]
Y[z]=bY[z]*s0
kY[z]=(N>40)||(10-2*bY[z])*s0
Q=pY[1][119-z]=pY[0][z]=PY[z]
if(N<7 && z>40){pY[0][z]=pY[1][119-z]=Q+(Math.random()*Y[z])|1
Y[24]=Y[94]=29}}}
function Pz(U,K,b){
var W,X,h,E,a,v,n,k=-1,u=U>>3,V=U^8,D=Ds[u],w=[],m,T,p=pY[u],H,d=KL[u],z,c,g,e=G[U],f=e.length,B=R,J=j
for (z=0;z<f;z++){W=e[z][1]
a=B[W]
if(e[z][0]==a){a&=7
if(a>1){c=a==6
H=c?kY:Y
T=b-H[W]
n=MV[a]
if(a==3||c){for(v=0;v<8;){X=W+n[v++]
E=B[X]
if(!E||(E&24)==V){w[++k]=[T+J[E]+H[X],W,X]}}if(c&&d){if(d&1&&!(B[W-1]+B[W-2]+B[W-3])&&CH(W-2,V,D,-1))w[++k]=[T+11,W,W-2]
if(d&2&&!(B[W+1]+B[W+2])&&CH(W,V,D,1))w[++k]=[T+12,W,W+2]}}else{g=n.length
for(v=0;v<g;){E=0
m=n[v++]
X=W
while(!E){X+=m
E=B[X]
if(!E||(E&24)==V){w[++k]=[T+J[E]+H[X],W,X]}}}}}else{T=b-p[W]
X=W+D
if(!B[X]){w[++k]=[T+p[X],W,X]
if(!p[W]&&(!B[X+D])){w[++k]=[T+p[X+D],W,X+D,X]}}if(K&&(K==X+1||K==X-1))w[++k]=[T+p[X],W,K]
for(h=X-1;h<X+2;h+=2){E=B[h]+U
if(E&7&&E&8){w[++k]=[T+J[E]+p[h],W,h]}}}}}return w}
function CH(W,V,D,T){var X,E,x,m,S=W+3,a=D+2,k=MV[3],B=R
for(;W<S;W++){for(m=D-2;++m<a;){E=B[W+m]
if(E&&(E&8)==V&&((E&8)==1||(E&7)==6))return 0
E=0
X=W
while(!E){X+=m
E=B[X]
if((E==V+2+(m!=D)*2)||E==V+5)return 0}}for(z=0;z<8;)if(B[W+k[z++]]-V==3)return 0}E=0
W-=3
while(!E){W-=T
E=B[W]
if(E==V+2||E==V+5)return 0}return 1}

function B(Q){var a=R[Q],p='PI'
if(J)return
if(q==Q&&I){O(p,0)
O(q,I,1)
I=0
return}if(a&&M==(a&8)){if(I)O(q,I,1)
I=a
q=Q
O(q,0,1)
O(p,a)
if(E)dr()
d.onmousemove=dr
return}if(I){if(mv(q,Q,d.FF.h.selectedIndex,y)){O(p,0)
d.onmousemove=null
if(A)Ic.top=Ic.left='0px'
I=0
if(!J){var t=Z((d.FF.i.selectedIndex+1),M,0,BE,BE,Al,Bt,K)
mv(t[1],t[2],0)}}}}
function Sh(s,e){var a=R[s]
R[e]=a
R[s]=0
O(s,0,1)
O(e,a,1)}
function Df(x){d.FF.b.value+='\n '+x}
function Rf(a){P=a
for(var z=0;z<BE;z++)if(R[z]<16)O(z,R[z],1)
if(P!=M){Tt=Z((d.FF.i.selectedIndex+1),M,0,BE,BE,Al,Bt,K)
mv(Tt[1],Tt[2],0)}}
function Gb(){if(!N)return
N-=2
var b=Rh[N]
R=eval("["+b[0]+"]")
KL=eval("["+b[1]+"]")
Df(' --undo--')
K=b[2]
M=N%2
Rf(M)
H()}
function dr(e){e=e||event
Ic.left=(e.clientX+1)+'px'
Ic.top=(e.clientY-4)+'px'}
function O(x,y,z){if((A||x!='PI')&&z)x="i"+(P?119-x:x)
d.images[x].src='jschess/'+y+'.gif'}
h='<table border="0" cellpadding="2" class="t">'
for(y=90;y>10;y-=10){h+="<tr>"
for(x=0;x<10;x++){z=y+x
if(x&&x<9){h+=('<td class="'+(x+(y/10)&1?'b':'w')+'"><a href="#" onclick="B(P?119-'+z+':'+z+'); return false"><img src="jschess/0.gif" width="1" height="32" border="0"><img src="jschess/0.gif" width="32" height="30" name="i'+z+'" border="0"><img src="jschess/0.gif" width="1" height="32" border="0"></a></td>\n')}}h+='</tr>\n'}h+='</table>'
d.write(h)
Rf(0)

</script>
			</td>
			<td>
				<textarea name="b" cols="12" rows="18"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="controlBar controlBarBottom">
				Next pawn becomes:
				<select name="h">
					<option selected>queen</option>
					<option>bishop</option>
					<option>knight</option>
					<option>rook</option>
				</select>
				
				Computer level:
				<select name="i">
					<option>stupid</option>
					<option selected>middling</option>
					<option>slow</option>
				</select>
			</td>
		</tr>
		</tbody>
		</table>
	</form>
	<br/>
	
	<table id="tableAbout" width="460" align="center">
	<tbody>
	<tr>
		<td align="left" id="aboutCell">
			<p>
				<b>P4wn</b> is Javascript chess written by Douglas Bagnall. Original website can be found here: <a href="http://p4wn.sourceforge.net/">http://p4wn.sourceforge.net/</a>.
			</p>
			<p>
				This version is 6K engine with new graphics for better readability and respective code changes.
			</p>
			<p>
				<b>Notes</b>
			</p>
			<ul>
				<li>Castling is done by moving the king, rook moves automatically.</li>
				<li>When swapping sides computer makes its move instantly (since it's its turn) so you may be disoriented at first and not notice it.</li>
				<li>May be slow/jerky with some browsers/computers</li>
			</ul>
			<p align="right">
				<a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#97;&#97;&#98;&#114;&#97;&#109;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;" title="e-mail">aab</a>
			</p>
		</td>
	</tr>
	</tbody>
	</table>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
// define("_E_", "0");

// define("_P_", "1");
// define("_N_", "2");
// define("_B_", "3");
// define("_R_", "4");
// define("_Q_", "5");
// define("_K_", "6");

// define("_p_", "7");
// define("_n_", "8");
// define("_b_", "9");
// define("_r_", "10");
// define("_q_", "11");
// define("_k_", "12");

// define("_A1_", "1");
// define("_A2_", "2");
// define("_A3_", "3");
// define("_A4_", "4");
// define("_A5_", "5");
// define("_A6_", "6");
// define("_A7_", "7");
// define("_A8_", "8");

// define("_B1_", "9");
// define("_B2_", "10");
// define("_B3_", "11");
// define("_B4_", "12");
// define("_B5_", "13");
// define("_B6_", "14");
// define("_B7_", "15");
// define("_B8_", "16");

// define("_C1_", "17");
// define("_C2_", "18");
// define("_C3_", "19");
// define("_C4_", "20");
// define("_C5_", "21");
// define("_C6_", "22");
// define("_C7_", "23");
// define("_C8_", "24");

// define("_D1_", "25");
// define("_D2_", "26");
// define("_D3_", "27");
// define("_D4_", "28");
// define("_D5_", "29");
// define("_D6_", "30");
// define("_D7_", "31");
// define("_D8_", "32");

// define("_E1_", "33");
// define("_E2_", "34");
// define("_E3_", "35");
// define("_E4_", "36");
// define("_E5_", "37");
// define("_E6_", "38");
// define("_E7_", "39");
// define("_E8_", "40");

// define("_F1_", "41");
// define("_F2_", "42");
// define("_F3_", "43");
// define("_F4_", "44");
// define("_F5_", "45");
// define("_F6_", "46");
// define("_F7_", "47");
// define("_F8_", "48");

// define("_G1_", "49");
// define("_G2_", "50");
// define("_G3_", "51");
// define("_G4_", "52");
// define("_G5_", "53");
// define("_G6_", "54");
// define("_G7_", "55");
// define("_G8_", "56");

// define("_H1_", "57");
// define("_H2_", "58");
// define("_H3_", "59");
// define("_H4_", "60");
// define("_H5_", "61");
// define("_H6_", "62");
// define("_H7_", "63");
// define("_H8_", "64");

// define("_P_val", "100");
// define("_N_val", "300");
// define("_B_val", "300");
// define("_R_val", "500");
// define("_Q_val", "900");
// define("_K_val", "400");

// define("_p_val", "100");
// define("_n_val", "300");
// define("_b_val", "300");
// define("_r_val", "500");
// define("_q_val", "900");
// define("_k_val", "400");

// define("_resign_val", "500");
// define("_draw_val", "350");

// define("_draw_move", "50");

// $board = array(1-64);

// $game_board = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq";

// $to_move = "w";

// $max_time = "5"; //second
// $max_depth = 7;

// $eco = "engine_book.dat";

// $level = "10";

// $B_elo = 1000;
// $W_elo = 1000;

// $my_move = "e4";

// $command = "move";

// $info = $my_move;

// $engine_mode = "uci"; //winbord

// $func_legal_pos = "legal_pos()";
// $func_legal_board = "legal_board()";

// $func_legal_move = "legal_move()";
// $func_all_legal_move = "all_legal_move()";

// $func_legal_move = "legal_p_move()";
// $func_legal_move = "legal_n_move()";
// $func_legal_move = "legal_b_move()";
// $func_legal_move = "legal_r_move()";
// $func_legal_move = "legal_q_move()";
// $func_legal_move = "legal_k_move()";

// $func_print_move = "print_move()";
// $func_print_board = "print_board()";

// $func_move = "move()";

// $func_best_move = "eco_move()";

// $func_best_move = "ego_move()"; //end game

// $func_best_move = "best_move()";

// $func_best_move = "rigth_move()";

// $func_print_board = "rigth_move()";

// $func_save_board = "rigth_move()";

// $the_game_png = "rigth_move()";
// $the_game_edp = "rigth_move()";







// move
// move_now
// accept_resign
// accept_draw
// AlwaysSendMoveOnStop
// //Send a move on a missplaced stop.
// Analyze
// //The 'analyze' command is implemented.
// Bookoff
// //Command to disable enginebook.
// Bookon
// //Command to enable enginebook.
// Computer
// //Tell the engine if he plays against a computer
// Delay
// //Add a delay in ms between commands to the gui.
// Discard
// //Command to use for searching a list of moves.
// Edit
// //Command used for edit the board.
// Escape characters
// //Escape characters for some options
// Engine-spesific options
// //Command for tuning the engine
// Hash
// //Default hash-table size.
// HashCommand
// //Command to set the hash-table size.
// HashFormula
// //Formula to calculate the hash value.
// HashOnCommandline
// //Set the hash size on command line.
// Help //file
// //Make your own help file.
// InitString
// //Initializing commands to the engine.
// InitTime
// //Time from the engine is started to when its ready for play.
// LevelExtend
// //Different ways to set the time control.
// Logfile
// //Write communication to a log file.
// MateScore
// //Set score checkmate.
// Noise
// //Set ply for first pv-line.
// OwnBook
// //The engine have its own book.
// Ponder
// //The engine is able of pondering.
// Priority
// //Set the priority for the engine.
// Program
// //Name of executable file for engine.
// Protocol
// //Winboard protocol version.
// RunIdle
// //Set the startup priority for the engine.
// Search
// //Command to use for searching a list of moves.
// ShowThinkingMove
// //Show extended thinking information under search/ponder.
// SimulateHint
// //Use last PV as hintmove when this is missing.
// SlowDown
// //Add additional loops to simulate slower processor.
// Starttime
// //Add startuptime for the engine.
// TerminateHard
// //The adapter do the three finger salute for you.
// UseUndo
// //The 'undo' command is implemented.
// Visible
// //Set which option should be visible in the gui.
// WhiteScore
// //Score is given with white as plus when engine is black.

?>
