#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<algorithm>
#include<iostream>
#include<fstream>
#include<ctime>

#define RANDCHAR 50000 //So ky tu toi da cua van ban y khi sinh ngau nhien
#define XSIZE 100000 //So ky tu toi da cua xau mau x
#define YSIZE 10000000 //So ky tu toi da cua van ban y
#define ASIZE 255    //gia tri toi da cua ky tu trong x, y
using namespace std;
int kq[YSIZE];//ketqua
int k=0; //Chi so cua ket qua
double timeBF,timeKMP,timeBM; //thoi gian thuc hien thaut toan
int showkqtg = 1;

// 1. Doc du lieu tu ban phim

void NhapTuBanPhim(char* y,char* x){
    printf("\nNhap van ban y: ");
    fflush(stdin);
    gets(y);
    printf("Nhap chuoi x: ");
    fflush(stdin);
    gets(x);
}
// 2. Doc du lieu tu file
void NhapTuFile(char * y,char * x){
    FILE *fp;
    char* filename = (char*) malloc(200*sizeof(char));
    char c;
    int i = 0;
    printf("Nhap ten file: ");
    fflush(stdin);
    gets(filename);
    fp = fopen(filename, "r");
    if (fp == NULL){
        printf("Khong the mo file %s",filename);
    }
    else {
        while(1) {
            c = fgetc(fp);
            if (c == EOF || c == NULL)
                break;
            else
                y[i++] = c;
        }
    }
    printf("\nNhap chuoi x can tim: ");
    fflush(stdin);
    gets(x);
}
// 3. Sinh ngau nhien du lieu
int Random(int a, int b)
{
    return a + rand()%(b-a+1);
}

int Randd(){
    int k,a;
    k=Random(1,3);
    if (k==1){
        a = Random(48,57); //Tao ngau nhien tu 0 den 9 trong bang ma ASCII
    }
    if (k==2){
        a = Random(65,90); //Tao ngau nhien tu A den Z trong bang ma ASCII
    }
    if (k==3){
        a = Random(97,122); //Tao ngau nhien tu a den z trong bang ma ASCII
    }
    return a;
}

void TaoDuLieuNgauNhien(char* y,char* x){
    int a;
    for(int i = 0; i < RANDCHAR; i++){
        a=Randd();
        y[i] =(char)a;
    }
    printf("Nhap chuoi x can tim: ");
    fflush(stdin);
    gets(x);
}
// 4.Hien thi du lieu ra man hinh
void HienKetQua(char* y,char* x){
    printf("\nVan ban y:");
    printf("%s", y);
    printf("\nChuoi x:");
    printf("%s", x);
}

// 5.Luu du lieu ra file
void LuuDuLieuDenFile(char* y,char* x){
    FILE *fp;
    char* filename = (char*) malloc(100*sizeof(char));
    char c;
    int i = 0;
    printf("Nhap ten file de luu: ");
    fflush(stdin);
    gets(filename);
    fp = fopen(filename, "w");
    
    while(1) {
        c = y[i++];
        if (c == NULL)
            break;
        else
            fputc(c, fp);
    }
}

// 6. Brute Force algorithm
void BF(char *y, char *x) {
    clock_t begin = clock(); //ghi l?i th?i gian d?u
    k=0;
    int m=strlen(x);
    int n=strlen(y);
    int i, j;
    for (j = 0; j <= n - m; ++j) {
        if(showkqtg){
            cout<<"Vi tri: y["<<j<<"]";
        }
        for (i = 0; i < m && x[i] == y[i + j]; ++i);
        if(showkqtg){
            cout<<" So ky tu trung: "<<i;
            if(i<m)cout<<" mismatch tai vi tri x["<<i<<"]"<<endl;
        }
        if (i >= m){
            if(showkqtg)cout<<" Match!"<<endl;
            kq[k]=j;
            k++;
        }
    }
    if(showkqtg){
        cout << "Tim thay tai vi tri: ";
        for (i=0;i<k;i++){
            cout<<kq[i]<<" ";
        }
    }
    clock_t end = clock(); //ghi l?i th?i gian l˙c sau
    timeBF=(double)(end-begin)/CLOCKS_PER_SEC;
    if(showkqtg)cout<< "\nThoi gian: "<<timeBF<<"s\n";
    
}

// 7. Knuth-Morris-Pratt algorithm
void preKmp(char *x, int m, int kmpNext[]) {//Do dai day v lon nhat torng day x[0..i-1]
    int i, j;
    i = 0;
    j = kmpNext[0] = -1;
    while (i < m) {
        while (j > -1 && x[i] != x[j]){
            j = kmpNext[j];
        }
        i++;
        j++;
        if (x[i] == x[j]){
            kmpNext[i] = kmpNext[j];
        }
        else{
            kmpNext[i] = j;
        }
    }
    if(showkqtg){
        i=0;
        cout<<"kmpNext: ";
        while(i< m) {
            cout<<kmpNext[i]<<" ";
            i++;
        }
        cout<<endl;
    }
}


void KMP(char *y, char *x) {
    clock_t begin = clock();
    k=0;
    int kmpNext[XSIZE];
    int m=strlen(x);
    int n=strlen(y);
    preKmp(x, m, kmpNext);
    int i = 0, j = 0; // i la vi tri cua ky tu trong x // j la vi tri ky tu bat dau trong y
    while (j < n-m) {
        if(showkqtg) cout<<"Vi tri: y["<<j-i<<"]  ";
        
        while (i > -1 && x[i] != y[j]){
            if(showkqtg)cout<<"Mismatch tai x["<<i<<"]"<<endl;
            if(showkqtg) cout<<"Shift by "<<i-kmpNext[i]<<endl;
            i = kmpNext[i];
        }
        if(showkqtg)if(x[i] == y[j])cout<<"Trung tai vi tri x["<<i<<"]"<<endl;
        i++;
        j++;
        if (i >= m) {
            if(showkqtg)cout<<"Match!"<<endl;
            kq[k]=j-i;
            k++;
            if(showkqtg) cout<<"Shift by "<<i-kmpNext[i]<<endl;
            i = kmpNext[i];
        }
    }
    if(showkqtg){
        cout << "Tim thay tai vi tri: ";
        for (i=0;i<k;i++){
            cout<<kq[i]<<" ";
        }
    }
    clock_t end = clock(); //ghi l?i th?i gian l˙c sau
    timeKMP=(double)(end-begin)/CLOCKS_PER_SEC;
    if(showkqtg)cout<< "\nThoi gian: "<<timeKMP<<"s\n";
}

// 8.Boyer-Moore algorithm
void preBmBc(char *x, int m, int bmBc[]) {
    int i;
    for (i = 0; i < ASIZE; ++i) // ASIZR la ma ANSCII lon nhat trong mau x
        bmBc[i] = m;
    for (i = 0; i < m - 1; ++i)
        bmBc[x[i]] = m - i - 1;
    
    if(showkqtg){
        i=0;
        cout<<"bmBc: ";
        for (i = 0; i <= m - 1; ++i)
            cout<<bmBc[x[i]]<<" ";
        cout<<endl;
    }
}

void suffixes(char *x, int m, int *suff) {
    int y[m]; suff[m-1]=m;
    int i,j=0,f=0;
    //Luu cac vi tri cua ky tu cuoi cung vao mang y[]
    for(i=0; i<m-1; i++) {
        if(x[i]==x[m-1]){
        y[j]=i; j++;
        }
        suff[i]=0;
    }
    //Tien hanh so sanh lap
    for(int i=0;i<j;i++){
        int end=m-1;
        int temp=y[i];
        f=0;
        while ((x[end] == x[temp]) && (temp>=0)){
            f++;
            end--;
            temp--;
        }
        suff[y[i]]=f;
    }
    if(showkqtg){
        i=0;
        cout<<"suff: ";
        for (i = 0; i <= m - 1; ++i)
            cout<<suff[i]<<" ";
        cout<<endl;
    }
}
/*
void suffixes(char *x, int m, int *suff) {//Do dai cua hau to tai i trung voi hau to cua x
    int f, g, i;
    
    suff[m - 1] = m;
    g = m - 1;
    for (i = m - 2; i >= 0; --i) {
        if (i > g && suff[i + m - 1 - f] < i - g)
            suff[i] = suff[i + m - 1 - f];
        else {
            if (i < g)
                g = i;
            f = i;
            while (g >= 0 && x[g] == x[g + m - 1 - f])
                --g;
            suff[i] = f - g;
        }
    }
    if(showkqtg){
        i=0;
        cout<<"suff: ";
        for (i = 0; i <= m - 1; ++i)
            cout<<suff[i]<<" ";
        cout<<endl;
    }
}
*/
void preBmGs(char *x, int m, int bmGs[]) {//So buoc can dich tai vi tri i de tim thay hau to x[i+1..m-1] cua u lap lai trong x
    int i, j, suff[XSIZE];
    
    suffixes(x, m, suff);
    
    for (i = 0; i < m; ++i)
        bmGs[i] = m;
    for (i = m - 1; i >= 0; --i)
        if (suff[i] == i + 1) //Neu substring 0..i dong thoi la substring ket thuc tai x
            for (j=0; j < m - 1 - i; ++j)
                if (bmGs[j] == m)
                    bmGs[j] = m - 1 - i;
    
    for (i = 0; i <= m - 2; ++i)
        bmGs[m - 1 - suff[i]] = m - 1 - i;
    
    if(showkqtg){
        i=0;
        cout<<"bmGs: ";
        for (i = 0; i <= m - 1; ++i)
            cout<<bmGs[i]<<" ";
        cout<<endl;
    }
}


void BM(char *y, char *x) {
    clock_t begin = clock();
    k=0;
    int i, j, bmGs[XSIZE], bmBc[ASIZE];
    int m=strlen(x);
    int n=strlen(y);
    preBmBc(x, m, bmBc);
    preBmGs(x, m, bmGs);
    j = 0;
    int t;
    while (j <= n - m) {
        if(showkqtg)cout<<"Vi tri y["<<j<<"]"<<endl;
        for (i = m - 1; i >= 0 && x[i] == y[i + j]; --i);
        if(showkqtg){
            cout<<"So ky tu trung: "<<m-i-1<<endl;
        }
        if (i < 0) {
            kq[k]=j;
            k++;
            j += bmGs[0];
            if(showkqtg)cout<<"Match! Shift by bmGs[0] = "<<bmGs[0]<<endl;
        }
        else{
            t=max(bmGs[i], bmBc[y[i + j]] - (m - 1 - i));
            if(showkqtg)cout<<"Mismatch tai x["<<i<<"]"<<endl;
            if(showkqtg)cout<<"bmGs = "<<bmGs[i]<<"; bmBc = "<<bmBc[y[i + j]] - (m - 1 - i)<<" => Shift by "<<t<<endl;
            j += t;
        }
    }
    if(showkqtg){
        cout << "Tim thay tai vi tri: ";
        for (i=0;i<k;i++){
            cout<<kq[i]<<" ";
        }
    }
    clock_t end = clock(); //ghi l?i th?i gian l˙c sau
    timeBM=(double)(end-begin)/CLOCKS_PER_SEC;
    if(showkqtg)cout<< "\nThoi gian: "<<timeBM<<"s\n";
}

// 9. Xem ket qua tren man hinh
void XemKetQua(int* kq,char *y, char *x){
    int m=strlen(x);
    int n=strlen(y);
    if(k==0) cout<<"Khong tim thay!"<<endl;
    else{
        cout << "Tim thay tai vi tri: ";
        for (int i=0;i<k;i++){
            cout<<kq[i]<<" ";
        }
        cout<<endl;
    }
    cout<<"m = "<<m<<" n = "<<n<<endl;
    printf("Thoi gian thuc hien thuat toan BF: %.25f\n",timeBF);
    printf("Thoi gian thuc hien thuat KMP: %.25f\n",timeKMP);
    printf("Thoi gian thuc hien thuat BM: %.25f",timeBM);
    //    cout<<"Thoi gian thuc hien thuat toan BF: "<<timeBF<<endl;
    //    cout<<"Thoi gian thuc hien thuat toan KMP: "<<timeKMP<<endl;
    //    cout<<"Thoi gian thuc hien thuat toan BM: "<<timeBM<<endl;
    
}

//10. Luu het qua ra file
void LuuKetQuaRaFile(int* kq){
    char* filename = (char*) malloc(100*sizeof(char));
    printf("Nhap ten file: ");
    fflush(stdin);
    gets(filename);
    
    ofstream file;
    file.open(filename);
    for(int i = 0; i < k; i++)
    {
        file<<kq[i];
        file<<" ";
    }
    file.close();
}

//11. Xem/Khong xem ket qua trung gian

int main()
{
    char *x;
    x = (char*) malloc(XSIZE*sizeof(char));
    char *y;
    y = (char*) malloc(YSIZE*sizeof(char));
    x = "GCAGAGAG";
    y = "GCATCGCAGAGAGTATACAGTACG";
    
    int ch;
    printf("\n\n============================\n");
    printf("CHUONG TRINH . . .\n");
    printf("======================\n");
    printf(" 1. Nhap du lieu tu ban phim\n");
    printf(" 2. Nhap du lieu tu file (ten vao tu ban phim)\n");
    printf(" 3. Tao du lieu ngau nhien\n");
    printf(" 4. Xem du lieu tren man hinh\n");
    printf(" 5. Ghi du lieu ra file (ten nhap tu ban phim)\n");
    printf(" 6. Tim kiem bang Brute Force algorithm\n");
    printf(" 7. Tim kiem bang Knuth-Morris-Pratt algorithm\n");
    printf(" 8. Tim kiem bang Boyer-Moore algorithm\n");
    printf(" 9. Xem ket qua tren man hinh\n");
    printf(" 10. Ghi ket qua ra file\n");
    printf(" 11. Xem/Khong xem ket qua trung gian\n");
    printf(" 0. Thoat khoi chuong trinh\n");
    printf("----------------------------\n");
    
    while(1){
        printf("\n");
        printf("------Chon chuc nang: ");
        scanf("%d", &ch);
        switch(ch){
            case 1: printf("1. Nhap du lieu tu ban phim");
                NhapTuBanPhim(y,x);
                break;
            case 2: printf("2. Nhap du lieu tu file (ten vao tu ban phim)\n");
                NhapTuFile(y,x);
                break;
            case 3: printf("3. Tao du lieu ngau nhien\n");
                TaoDuLieuNgauNhien(y,x);
                break;
            case 4: printf("4. Xem du lieu tren man hinh\n");
                HienKetQua(y,x);
                break;
            case 5: printf("5. Ghi du lieu ra file (ten nhap tu ban phim)\n");
                LuuDuLieuDenFile(y,x);
                break;
            case 6: printf("6. Tim kiem bang Brute Force algorithm\n");
                BF(y,x);
                printf("Done!");
                break;
            case 7: printf("7. Tim kiem bang Knuth-Morris-Pratt algorithm\n");
                KMP(y,x);
                printf("Done!");
                break;
            case 8: printf("8. Tim kiem bang Boyer-Moore algorithm\n");
                BM(y,x);
                printf("Done!");
                break;
            case 9: printf("9. Xem ket qua tren man hinh\n");
                XemKetQua(kq,y,x);
                break;
            case 10: printf("10. Ghi ket qua ra file\n");
                LuuKetQuaRaFile(kq);break;
            case 11: if (showkqtg==1)printf("Da chon KHONG XEM ket qua trung gian\n");
                if (showkqtg==0)printf("Da chon XEM ket qua trung gian\n");
                showkqtg = 1 - showkqtg;
                break;
            case 0:  printf("Tam biet!");
                return 0;
            default: printf("Wrong choice!!");
                break;
        } // end switch
    }// end do-while
    return 0;
} // end main

