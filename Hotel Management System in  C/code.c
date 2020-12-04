#include <stdio.h>
#include <conio.h>
#include <string.h>
#include <dos.h>
#include <time.h>
struct stock
{ 
  char in[100];      //item name
  int  sn;           //stock quantity
} s[100];

struct login
{ 
  char lid[30];      //login id
  char pwd[30];      //password
  char type;         //Type of user administrator (a) or normal user (u)
}l[100];

struct date
{ 
  int day;
  int month;
  int year;
} d[100];

struct order
{ 
  char name[30];
  char pno[15];       //phone no
  int  c;            //item code
  int r;            //item rate
  struct date d;   //date of order
} o[100];

struct menu
{ 
  char name[30];    //item name
  int  co;          //item code
  int ra;         //item rate
} m[100];



//if use file then file name is stock.txt
void estock()
{
 FILE *fp,*fs;
 int i,j,a;
 char cha; 
 int coun=0;
 fp = fopen("stock.txt","r");
 if(fp == NULL)
   {   
      printf("\nerror in file stock.\n");
	  getch();
	 }
 cha=' ';
 while(cha!=EOF)
  { 
    fscanf(fp," %s",&s[coun].in);
    fscanf(fp," %d",&s[coun].sn);
	cha=fgetc(fp);
	coun++;
   }
  
 printf("\n\n");
 printf("                                 Enter the New Items Details");
 wer:
 printf("\n\n                                 Enter the Item Name : ");
 scanf("%s",&s[coun].in);
 for(i=0;i<coun;i++)
  {  
     if(strcmpi(s[i].in,s[coun].in)==0)
       { 
	      printf("\n                            Duplicate Name, Enter New Name.");
          goto wer; 
	    }
    }
 printf("\n");
 printf("                                  Enter the Quantity : ");
 fflush(stdin);
 scanf("%d",&s[coun].sn);
  
 while(s[coun].sn<0)
  { 
    printf("\n                            Invalid Quantity, Enter Again.\n");
    printf("                                  Enter the Quantity : ");
    fflush(stdin);
    scanf("%d",&s[coun].sn);
    }
 fclose(fp);
  
 fp = fopen("stock.txt","w");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	}
 int cou=0;
 while(cou<=coun)
   { 
      fprintf(fp,"%s\n",s[cou].in);
	  if(cou!=coun)
	    {
		  fprintf(fp,"%d\n",s[cou].sn);
		 }
	  else
	    {
		  fprintf(fp,"%d",s[cou].sn);
		 }
	  cou++;
	}
 fclose(fp);
}
    

void shstock()
{
 FILE *fp;
 int i,j,a,cou=0;
 char cha,id[20],pwd[20]; 
 fp = fopen("stock.txt","r");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	}
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
     fscanf(fp,"%s",&s[coun].in);
     fscanf(fp,"%d",&s[coun].sn);
	 cha=fgetc(fp);
	 coun++;
	}
 printf("\n                           Item Details\n\n");
 printf("+-----------------------------------------------------------------+\n");
 printf("|Item Name                       Item Quantity                    |\n");
 printf("+-----------------------------------------------------------------+\n");
 while(cou<coun)
   {
     printf("%s",s[cou].in);
     if(cou!=coun)
       {
	     printf("\t\t\t\t\t%d\n",s[cou].sn);
		}
     cou++;
    }
 printf("\n+-----------------------------------------------------------------+\n");
 fclose(fp);
 }

  
void mstock()
{
 FILE *fp;
 int i,j,a,an=-1;
 char cha,n[100]; 
 fp = fopen("stock.txt","r");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	}
 int coun=0;
 cha=' ';
 while(cha!=EOF)
    { 
	  fscanf(fp," %s",&s[coun].in);
      fscanf(fp," %d",&s[coun].sn);
	  cha=fgetc(fp);
	  coun++;
	}
 printf("\n\n");
 printf("                                   Modify The Item Details\n\n\n");
 printf("                                 Enter the Item Name : ");
 scanf("%s",&n);
 for(i=0;i<coun;i++)
   {  if(strcmpi(s[i].in,n)==0)
        {
		   printf("\n\n                                Enter the New Quantity : ");
           fflush(stdin);
           scanf("%d",&s[i].sn);
           while(s[i].sn<0)
            {
			  printf("\n                            Invalid Quantity, Enter Again.\n");
              printf("                                  Enter the Quantity : ");
              fflush(stdin);
              scanf("%d",&s[i].sn);
	        }
           an=1;
	       break;
		}
	}
 if(an==-1)
   { 
     printf("\n\n                             No item exists with the given name.\n");
    }
 fclose(fp);
  
 fp = fopen("stock.txt","w");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	}
 int cou=0;
 while(cou<coun)
   { 
      fprintf(fp,"%s\n",s[cou].in);
	  if(cou!=coun-1)
	     {
		   fprintf(fp,"%d\n",s[cou].sn);
		  }
	  else
	     {
		   fprintf(fp,"%d",s[cou].sn);
		  }
	  cou++;
	}
 fclose(fp);
 }
  

  
//if use file then file name is menu.txt
void emenu()
{
 FILE *fp;
 int i,j,a;
 char cha; 
 fp = fopen("menu.txt","r");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	}
 int coun=0;
 cha=' ';
 while(cha!=EOF)
    { 
	  fscanf(fp,"%s",&m[coun].name);
      fscanf(fp,"%d",&m[coun].co);
	  fscanf(fp," %d",&m[coun].ra);
	  cha=fgetc(fp);
	  coun++;
	 }
 printf("\n\n");
 printf("                                     Enter the New Dish Details");
 we:
  printf("\n\n                                 Enter the Dish Name  : ");
  scanf("%s",&m[coun].name);
  for(i=0;i<coun;i++)
     {  
	   if(strcmpi(m[i].name,m[coun].name)==0)
         { 
		   printf("\n                              Duplicate Name, Enter New Name.");
           goto we; 
	      }
       }
  printf("\n");
  w:
   printf("                                  Enter the Dish Code : ");
   fflush(stdin);
   scanf("%d",&m[coun].co);
   for(i=0;i<coun;i++)
     {  
	   if(m[i].co==m[coun].co)
         { 
		   printf("\n                              Duplicate Code, Enter New Code.\n");
           goto w; 
	      }
	   if(m[coun].co<0)
         { 
		   printf("\n                               Invalid Code, Enter New Code.\n");
           goto w; 
	      }
      }
 printf("\n");
 printf("                                 Enter the Dish price : ");
 fflush(stdin);
 scanf("%d",&m[coun].ra);
 while(m[coun].ra<0)
    {
   	  printf("\n                               Invalid Price, Enter Again.\n");
      printf("                                 Enter the Dish price : ");
      fflush(stdin);
      scanf("%d",&m[coun].ra);
     }
  
 fclose(fp);
  
 fp = fopen("menu.txt","w");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	 }
 int cou=0;
 while(cou<=coun)
   { 
      fprintf(fp,"%s\n",m[cou].name);
      fprintf(fp,"%d\n",m[cou].co);
	  if(cou!=coun)
	    {
		  fprintf(fp,"%d\n",m[cou].ra);
		 }
	  else
	    {
		  fprintf(fp,"%d",m[cou].ra);
		 }
	  cou++;
	}
 fclose(fp);
 }


void shmenu()
{
 FILE *fp;
 int i,j,a,cou=0;
 char cha,id[20],pwd[20]; 
 fp = fopen("menu.txt","r");
 if(fp == NULL)
   { 
      printf("\nerror in file login.\n");
	  getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
     fscanf(fp,"%s",&m[coun].name);
     fscanf(fp,"%d",&m[coun].co);
	 fscanf(fp,"%d",&m[coun].ra);
	 cha=fgetc(fp);
	 coun++;
	 }
 printf("\n                             Menu Details\n\n");
 printf("+----------------------------------------------------------------------+\n");
 printf("|Dish Name                    Code                     Rate            |\n");
 printf("+----------------------------------------------------------------------+\n");
 while(cou<coun)
   {
     printf("%s",m[cou].name);
     printf("\t\t\t\t%d",m[cou].co);
     printf("\t\t\t%d",m[cou].ra);
     printf("\n");
     cou++;
	 }
 printf("+----------------------------------------------------------------------+\n");
 fclose(fp);
 }
  

void momenu()
{
 FILE *fp;
 int i,j,a,an=-1,l;
 char cha,n[100]; 
 fp = fopen("menu.txt","r");
 if(fp == NULL)
   { 
      printf("\nerror in file login.\n");
	  getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
     fscanf(fp," %s",&m[coun].name);
     fscanf(fp," %d",&m[coun].co);
	 fscanf(fp," %d",&m[coun].ra);
	 cha=fgetc(fp);
	 coun++;
	 }
 printf("\n                                 Modify the Menu Details\n\n");
 printf("                                 Enter the Dish Name  : ");
 scanf("%s",&n);
 printf("\n");
 fflush(stdin);
 for(i=0;i<coun;i++)
   { 
      if(strcmpi(m[i].name,n)==0)
        { 
		   an=1;
	       strcpy(m[i].name,n);
	       rty:
	         printf("                               Enter the New Dish Code : ");
             fflush(stdin);
             scanf("%d",&l);
             for(j=0;j<=coun;j++)
              {  
			    if(l==m[j].co)
                   { 
				      printf("\n                              Duplicate Code, Enter New Code.\n");
                      goto rty;
					 }
	            if(l<0)
                   { 
				      printf("\n                               Invalid Code, Enter New Code.\n");
                      goto rty; 
	                 }
              }
		   m[i].co = l;
           printf("\n");
           printf("                                 Enter the New price : ");
           fflush(stdin);
           scanf("%d",&m[i].ra);
           while(m[i].ra<0)
            {
  	           printf("\n                               Invalid Price, Enter Again.\n");
               printf("                                 Enter the Dish price : ");
               fflush(stdin);
               scanf("%d",&m[i].ra);
             }
	       break;
		 }
	 }
 if(an==-1)
  {
    printf("\n No menu item exists with the given name.");
   }
 fclose(fp);
  
 fp = fopen("menu.txt","w");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	 }
 int cou=0;
 while(cou<coun)
   { 
      fprintf(fp,"%s\n",m[cou].name);
      fprintf(fp,"%d\n",m[cou].co);
	  if(cou!=coun-1)
	    {
		   fprintf(fp,"%d\n",m[cou].ra);
		 }
	  else
	    {
		   fprintf(fp,"%d",m[cou].ra);
		 }
	  cou++;
	 }
 fclose(fp);
 }
 



//if use file then file name is login.txt
int elogin()
{
 FILE *fp;
 int i,j,a;
 char cha,id[20],pwd[20]; 
 fp = fopen("login.txt","r");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
      fscanf(fp," %s",&l[coun].lid);
      fscanf(fp," %s",&l[coun].pwd);
	  fscanf(fp," %c",&l[coun].type);
	  cha=fgetc(fp);
	  coun++;
	 }
 printf("\n                              Enter the new Login Details\n\n");
 wer:
   printf("\n                                 Enter the Login ID : ");
   fflush(stdin);
   scanf("%s",&l[coun].lid);
   for(i=0;i<coun;i++)
      {  
	     if(strcmpi(l[i].lid,l[coun].lid)==0)
            { 
			  printf("\n                                Duplicate ID, Enter New ID.");
              goto wer; 
	         }
        }
 printf("\n                           Enter the Login Password : ");
 fflush(stdin);
 scanf("%s",&l[coun].pwd);
 while(strlen(l[coun].pwd)<8)
    {
  	  printf("\n                               Password is too small.\n");
      printf("                           Enter the Login Password : ");
      fflush(stdin);
      scanf("%s",&l[coun].pwd);
     }
 printf("\n                                  Enter the Id Type : ");
 fflush(stdin);
 scanf("%c",&l[coun].type);
 while(l[coun].type!='A'&&l[coun].type!='a'&&l[coun].type!='n'&&l[coun].type!='N')
   {   
       printf("\n                               Invalid Id Type, Enter Again.\n");
       printf("                                  Enter the Id Type : ");
       fflush(stdin);
       scanf("%c",&l[coun].type);
     }
 fclose(fp);
  
 fp = fopen("login.txt","w");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	 }
 int cou=0;
 while(cou<=coun)
 { 
    fprintf(fp,"%s\n",l[cou].lid);
    fprintf(fp,"%s\n",l[cou].pwd);
	if(cou!=coun)
	   {
	      fprintf(fp,"%c\n",l[cou].type);
		}
	else
	   {
	      fprintf(fp,"%c",l[cou].type);
		}
	cou++;
 }
 fclose(fp);
 }

  
int selogin()
{
 FILE *fp;
 int i,j,a;
 char cha,id[20],pwd[20]; 
 fp = fopen("login.txt","r");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	}
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
      fscanf(fp,"%s",&l[coun].lid);
      fscanf(fp,"%s",&l[coun].pwd);
	  fscanf(fp," %c",&l[coun].type);
	  cha=fgetc(fp);
	  coun++;
	}
 printf("\n                                 Enter the Login ID : ");
 scanf("%s",&id);
 printf("\n                           Enter the Login Password : ");
 fflush(stdin);
 int y=0;
 pwd[y]=getch();
 while(pwd[y]!='\x0D')
   {
     printf("*");
     y++;
     pwd[y] = getch();
    }
 pwd[y]='\0';
 printf("\n");
 for(i=0;i<coun;i++)
   { 
      if(strcmpi(l[i].lid,id)==0&&strcmpi(l[i].pwd,pwd)==0&&(l[i].type=='A'||l[i].type=='a'))
        {
		  a = 1;
          break;
		 }
	  else if(strcmp(l[i].lid,id)==0&&strcmpi(l[i].pwd,pwd)==0&&(l[i].type=='N'||l[i].type=='n'))
        {
		  a = 0;
          break;
		 }
	  else
	    a = 2;
	}
 fclose(fp);
 return a;
 }

	
void shlogin()
{
 FILE *fp;
 int i,j,a,cou=0;
 char cha,id[20],pwd[20]; 
 fp = fopen("login.txt","r");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
     fscanf(fp,"%s",&l[coun].lid);
     fscanf(fp,"%s",&l[coun].pwd);
	 fscanf(fp," %c",&l[coun].type);
	 cha=fgetc(fp);
	 coun++;
	}
 printf("\n                                 Login Details\n\n");
 printf("+------------------------------------------------------------------------------+\n");
 printf("|Login Id                    Password                                Type      |\n");
 printf("+------------------------------------------------------------------------------+\n");
 while(cou<coun)
   {
     printf("%s",l[cou].lid);
     printf("\t\t\t\t%s",l[cou].pwd);
     printf("\t\t\t\t%c",l[cou].type);
     printf("\n");
     cou++;
	}
 printf("+------------------------------------------------------------------------------+\n");
 fclose(fp);
 }



//if use file then file name is order.txt
void eorder()
{ 
 FILE *fp,*fs;
 int i,j,a,g,ab=-1;
 char cha;
 time_t now;
 time(&now);
 struct tm *local = localtime(&now);
 fs = fopen("menu.txt","r");
 if(fs == NULL)
   {
      printf("\nerror in file login.\n");
	  getch();
	}	
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
     fscanf(fs,"%s",&m[coun].name);
     fscanf(fs,"%d",&m[coun].co);
	 fscanf(fs," %d",&m[coun].ra);
	 cha=fgetc(fs);
	 coun++;
	}
 fclose(fs);

 cha = ' ';	
 fp = fopen("order.txt","a");
 if(fp == NULL)
   {   
      printf("\nerror in file login.\n");
	  getch();
	}
 cha=' ';
 printf("\n                          Enter the order Details\n\n");
 printf("                          Enter the Name Of Customer  : ");
 scanf("%s",&o[0].name);
 printf("\n");
 printf("                          Enter the Phone Number      : ");
 fflush(stdin);
 scanf("%s",&o[0].pno);
 tu:
   printf("\n");
   printf("                          Enter Item Code             : ");
   fflush(stdin);
   scanf("%d",&g);
   for(i=0;i<coun;i++)
      {  
	    if(m[i].co==g)
          { 
		     o[0].c=g;
             o[0].r = m[i].ra;
	         ab=1;
			}
        }
   if(ab==-1)
      {
         printf("\n                          No item with the same code.Enter Again.");
         goto tu;
	   }
 o[0].d.day = local->tm_mday;
 o[0].d.month = local->tm_mon + 1;
 o[0].d.year = local->tm_year + 1900;
 
 fprintf(fp,"\n%s\n",o[0].name);
 fprintf(fp,"%s\n",o[0].pno);
 fprintf(fp,"%d\n",o[0].c);
 fprintf(fp,"%d\n",o[0].r);
 fprintf(fp,"%d/%d/%d",o[0].d.day,o[0].d.month,o[0].d.year);
 fclose(fp);
 }


void shorder()
{
 FILE *fp;
 int i,j,a,cou=0;
 char cha,id[20],pwd[20]; 
 fp = fopen("order.txt","r");
 if(fp == NULL)
   {   
     printf("\nerror in file login.\n");
	 getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
      fscanf(fp,"%s",&o[coun].name);
      fscanf(fp,"%s",&o[coun].pno);
	  fscanf(fp,"%d",&o[coun].c);
	  fscanf(fp,"%d",&o[coun].r);
	  fscanf(fp,"%d/%d/%d",&o[coun].d.day,&o[coun].d.month,&o[coun].d.year);
	  cha=fgetc(fp);
	  coun++;
	 }
 printf("\n                  Order Details\n\n");
 printf("+--------------------------------------------------+\n");
 printf("|Name    Phone No       Code    Rate    Date       |\n");
 printf("+--------------------------------------------------+\n");
 while(cou<coun)
    { 
	  printf("%s\t",o[cou].name);
      printf("%s\t",o[cou].pno);
	  printf("%d\t",o[cou].c);
	  printf("%d\t",o[cou].r);
	  printf("%d/%d/%d",o[cou].d.day,o[cou].d.month,o[cou].d.year);
      printf("\n");
      cou++;
	 }
 printf("+--------------------------------------------------+\n");
 fclose(fp);
 }


void sshorder()
{ 
 FILE *fp;
 int i,j,a=0,cou=0;
 char cha,id[20]; 
 fp = fopen("order.txt","r");
 if(fp == NULL)
   {  
      printf("\nerror in file login.\n");
	  getch();
	 }
 int coun=0;
 cha=' ';
 while(cha!=EOF)
   { 
      fscanf(fp,"%s",&o[coun].name);
      fscanf(fp,"%s",&o[coun].pno);
	  fscanf(fp,"%d",&o[coun].c);
	  fscanf(fp,"%d",&o[coun].r);
	  fscanf(fp,"%d/%d/%d",&o[coun].d.day,&o[coun].d.month,&o[coun].d.year);
	  cha=fgetc(fp);
	  coun++;
	}
 printf("\n           Selected Customer Details\n\n");
 printf("Enter the Name for which you want to search data : ");
 scanf("%s",&id);
 printf("+--------------------------------------------------+\n");
 printf("|Name    Phone No       Code    Rate    Date       |\n");
 printf("+--------------------------------------------------+\n");
 while(cou<coun)
    { 
	   if(strcmpi(o[cou].name,id)==0)
         {
		   printf("%s\t",o[cou].name);
           printf("%s\t",o[cou].pno);
	       printf("%d\t",o[cou].c);
	       printf("%d\t",o[cou].r);
	       printf("%d/%d/%d",o[cou].d.day,o[cou].d.month,o[cou].d.year);
           printf("\n");
	       a++;
		  }
       cou++;
	 }
 printf("+--------------------------------------------------+\n");
 if(a==0)
  {
    printf("\n\n\t\t\t No data exist for the given name.\n");
   }
 fclose(fp);
 }



void xit()
{
 int i;
 for(i=1;i<=30;i++)
   { 
      Sleep(10);
      printf("*");
	}
 printf(" Logging You Out ");
 for(i=1;i<=30;i++)
   { 
      Sleep(10);
      printf("*");
	}
 system("COLOR 20");
 system("cls");
 }

int main()
{
  int i,an,a=-1,j;
  char id[100],pwd[100];
  char ch=' ',was;
  FILE *fp;
  char cha;
  x:
    system("COLOR 30");
    system("cls");
    for(i=1;i<=30;i++)
     {
	    printf("*");
	  }
    printf(" RESTAURANT MANAGEMENT SYSTEM ");
    for(i=1;i<=30;i++)
     {
	    printf("*");
	  }
    printf("\n");
    for(i=1;i<=90;i++)
     {
	    printf("-");
	  }
    printf("\n");
    for(i=1;i<=30;i++)
     { 
	    Sleep(10);
        printf("*");
	  }
    printf(" \t\tWELCOME\t\t    ");
    for(i=1;i<=30;i++)
     { 
	    Sleep(10);
        printf("*");
	  }
    printf("\n\n\n\n");
    printf("\t\tYou need to prove that you are a valid user or administrator.\n\n\n");
    a = selogin();
    if(a==0)
      {
	    printf("\n\t\t\t\tYou are Normal User.\n");
        ch = getch();
        if(ch!='&')
         {
		   tapri:
           system("cls");
           system("COLOR 30");
           system("COLOR B1");
		   printf("+--------------------------------------------------+\n");
		   printf("|          Enter 1 For Ordering The Food           |\n");
		   printf("|          Enter 2 For Viewing The  Orders         |\n");
		   printf("|          Enter 3 For Viewing The Stock           |\n");
		   printf("|          Enter 4 For Viewing The Menu            |\n");
		   printf("|          Enter 5 For Back                        |\n");
		   printf("|          Enter 6 For Exit                        |\n");
		   printf("+--------------------------------------------------+\n");
           printf("     Enter Your Choice : ");
	       scanf("%d",&an);
	       if(an==1||an==2||an==3|an==4)
	         {
			    system("cls");
    		    system("COLOR 40");
     			system("COLOR B5");}
				switch(an)
	              { 
				    case 1 : eorder(o);
               		         getch();
	                         goto tapri;
			                 break;
     			    case 2 : shorder(o);
                             getch();
	                         goto tapri;
			                 break;
	                case 3 : shstock();
	                         getch();
	                         goto tapri;
                             break;
                    case 4 : shmenu();
                             getch();
	                         goto tapri;
			                 break;
	                case 5 : for(i=1;i<=30;i++)
                               { 
							     Sleep(10);
                                 printf("*");
								}
                             printf(" Logging You Out ");
                             for(i=1;i<=30;i++)
                               { 
							     Sleep(10);
                                 printf("*");
								}
	                         goto x;
	                         break;
	                case 6 : xit();
			                 printf("\n\n");
                             printf("***************************** THANK YOU **********************************\n");
                             printf("\n\n");
                             printf("************************ Please come again *******************************\n\n\n");
			                 getch();
				   }
	      }
	  }
    else if(a==1)
     {
	   printf("\n\t\t\t\tYou are a administrator.\n");
       ch = getch();
         {
		    qwerty:
               system("cls");
               system("COLOR 30");
               system("COLOR B1");
	           printf("+--------------------------------------------------------------+\n");
	           printf("|          Enter 1 For Entering The Stock                      |\n");
	           printf("|          Enter 2 For Viewing The Stock                       |\n");
			   printf("|          Enter 3 For Modifying The Stock                     |\n");
			   printf("|          Enter 4 For Entering The Menu                       |\n");
			   printf("|          Enter 5 For Showing The Menu                        |\n");
			   printf("|          Enter 6 For Modifying The Menu                      |\n");
			   printf("|          Enter 7 For Entering The Login Details              |\n");
			   printf("|          Enter 8 For Showing The Login Details               |\n");
			   printf("|          Enter 9 For Entering The Order Details              |\n");
			   printf("|          Enter 10 For Searching a particular order           |\n");
			   printf("|          Enter 11 For Viewing all the orders                 |\n");
			   printf("|          Enter 12 For Back                                   |\n");
			   printf("|          Enter 13 For Exit                                   |\n");
			   printf("+--------------------------------------------------------------+\n");
			   printf("     Enter Your Choice : ");
			   scanf("%d",&an);
			   if(an==1||an==2||an==3||an==4||an==5||an==6||an==7||an==8||an==9||an==10||an==11||an==12||an==13)
	             {
				    system("cls");
     				system("COLOR 40");
     				system("COLOR B5");}
					switch(an)
					  { 
					    case 1 : estock();
               					 getch();
	           					 goto qwerty;
              					 break;
      					case 2 : shstock();
              					 getch();
	          					 goto qwerty;
              					 break;
	  					case 3 : mstock();
              					 getch();
	          					 goto qwerty;
			  					 break;
     					case 4 : emenu(m);
              					 getch();
	          					 goto qwerty;
              					 break;
	 					case 5 : shmenu();
              					 getch();
	          					 goto qwerty;
			  					 break;
	  					case 6 : momenu(m);
	           					 getch();
	          					 goto qwerty;
              					 break;
	  					case 7 : elogin();
	          					 getch();
	          					 goto qwerty;
              					 break;
	 					case 8 : shlogin();
              					 getch();
	          					 goto qwerty;
			  					 break;
	 	                case 9 : eorder(o);
	           					 getch();
	           					 goto qwerty;
              					 break;
	                    case 10 : sshorder(o);
                				  getch();
	            			      goto qwerty;
			    				  break;
	                    case 11 : shorder(o);
                				  getch();
	            				  goto qwerty;
			                      break;
	  					case 12 : for(i=1;i<=30;i++)
                                    { 
									   Sleep(10);
                                       printf("*");
									 }
                                  printf(" Logging You Out ");
               					  for(i=1;i<=30;i++)
               					    { 
									   Sleep(10);
                                       printf("*");
									 }
	                              goto x;
	                              break;
	  					case 13 : xit();
			                      printf("\n\n");
                                  printf("***************************** THANK YOU **********************************\n");
                                  printf("\n\n");
                                  printf("************************ Please come again *******************************\n\n\n");
					   }
		 }
	 }
  else 
    {
	   printf("\t\t\t\tYou are not a valid user.\n\t\t\tIf you want to login again, Enter Y for Yes : ");
       fflush(stdin);
       scanf("%c",&ch);
       if(ch=='y' || ch=='Y')
          {
		     system("cls");
             goto x;
			}
      }
 }
