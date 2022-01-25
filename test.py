import requests as rq
import re
import os
SRC_REG = ".*src=['\"].*['\"].*"
URL_REG = ".*href=['\"].*['\"].*"
BINARY='wb'
TEXT='wt'
__headers= {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36"
}
def  download(url:str,type:str=TEXT,outdir:str='./'):
    if(not outdir.endswith("/") or not outdir.endswith("\\")):
        outdir=outdir+'/'
    if(not os.path.exists(outdir)):
        os.mkdir(outdir)
    if(not url.endswith('/')):
        resp=rq.get(url,headers=__headers)
        if(resp.status_code!=200):
            raise Exception("无法完成请求："+url)
        out=outdir+re.split('/',url)[-1]
        try:
            with open(out,type) as fp:
                fp.write(resp.content)
        except Exception as e:
            print("失败(in function download):"+str(e))
            os.remove(out)
        else:
            pass
            print("成功,文件名:"+out)
        finally:
            return out
    else:
        raise Exception(url+" is a folder")
def getURL(url:str):
    resp=rq.get(url)
    if(resp.status_code!=200):
        raise Exception("无法完成请求")
    reg=[re.findall(URL_REG,resp.content.decode()),re.findall(SRC_REG,resp.content.decode())]
    res=[]
    try:
        for att in reg[0]: #遍历
            n=re.split(' ',att)
            for a in n:
                if(re.search("href=['\"].*['\"].*",a)):
                    a=re.sub('[\'"].*','',re.sub('href=[\'"]','',a))
                    if(re.search("http[s]:.*",a)):
                        res.append(a)
                    else:
                        res.append(url+a)
        for att in reg[1]: #遍历
            n=re.split(' ',att)
            for a in n:
                if(re.search("src=['\"].*['\"].*",a)):
                    a=re.sub('[\'"].*','',re.sub('src=[\'"]','',a))
                    if(re.search("http[s]:.*",a)):
                        res.append(a)
                    else:
                        res.append(url+a)
    except Exception as e:
        print("Error:"+str(e))
        return "Error"+str(e)
    return res
def __main():
    m=getURL(input("请输入目标网址："))
    out=input("请输入输出文件夹(默认为当前文件夹)：")
    if(out==''):
        out='./'
    for a in m:
        try:
            download(a,BINARY,out)
        except Exception as e:
            print("失败(in function 'main')："+str(e))
    print("按Enter退出")
    input()
    return m
if(__name__=="__main__"):
    __main()
