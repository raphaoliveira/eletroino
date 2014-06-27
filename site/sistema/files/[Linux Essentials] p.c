#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct{
int m;
int n;
char *f;
} ma;

int teste(int *a, int b);
void imprime(ma a);
void checa(ma *a, int *b, int c, int d , int e, int *f);
void abre(ma *a, int *b, int c, int d, int e);
int vit(ma a, int e);

int main()
{
    ma tab;
    tab.m=tab.n=0;
    int b=0;
    int i;
    int *a;
    int h;
    int q, w , e , r;
    q=w=e=-1;
    do
    {
        printf("Digite o numero de linhas: ");
        scanf("%d", &tab.m);
        printf("Digite o numero de colunas: ");
        scanf("%d", &tab.n);
        printf("Digite o numero de bombas: ");
        scanf("%d", &b);
        //scanf("%d%d%d", &tab.m , &tab.n , &b);
    }while((tab.m<1)&&(tab.n<1)&&(b<1)&&(b<tab.m*tab.n));

    tab.f=malloc(tab.m*tab.n*sizeof(char));
    a=malloc(b*sizeof(int));
    if((!a)||(!tab.f))
    {
        printf("Memoria insuficiente\n");
        return 1;
    }

    srand(time(0));

    for(i=0;i<b;i++)
    {
        do
        {
        a[i]=rand()%(tab.m*tab.n);
        h=teste( a , i );
        }while(h);
    }
    for (i=0;i<b;i++)
    {
        printf("%d\t", a[i]);
    }
    printf("\n");
    for (i=0;i<tab.m*tab.n;i++)
    {
        tab.f[i] = 'X' ;
    }
    do
    {
        do
        {
            imprime(tab);
            printf("Digite sua jogada: Linha , Coluna e Opcao(0 para abrir, 1 para marcar bomba e 2 para desmarcar\n");
            scanf("%d%d%d", &q ,&w, &e );
        }while((q>tab.m)&&(q<=0)&&(w>tab.n)&&(w<=0)&&(e<=0)&&(e>=2));
        switch(e)
        {
            case 0:
                if((tab.f[w+(q*tab.m)]== 'X') || (tab.f[w+(q*tab.m)]== '?'))
                {
                    r=vit(tab, b);
                    checa (&tab, a, q , w , b, &r);
                }
                else
                {
                    printf("Essa casa ja foi aberta\n");
                }
                break;
            case 1:
                if(tab.f[w+(q*tab.m)]== 'X')
                {
                    tab.f[w+(q*tab.m)]= '?';
                    r=vit(tab, b);
                }
                else
                {
                    printf("Essa casa ja foi aberta\n");
                }
                break;
            case 2:
                if(tab.f[w+(q*tab.m)]== '?')
                {
                    tab.f[w+(q*tab.m)]= 'X';
                    r=vit(tab,b);
                }
                else
                {
                    printf("Essa casa nao foi marcada\n");
                }
                break;
        }
    }while (r==0);
    if(r==1)
    {
        printf("Voce ganhou!\n");
    }
    else
    {
        printf ("Voce perdeu\n");
    }
    return 0;
}

void imprime(ma a)
{
    int i, j;
    for (i=0;i<a.m;i++)
    {
        for(j=0;j<a.n;j++)
        {
            printf("%c\t" , a.f[i*a.n + j] );
        }
        printf("\n\n");
    }
}

int teste(int *a, int y)
{
    int i, j;
    for (i=0;i<=y;i++)
    {
        for(j=i+1;j<=y;j++)
        {
            if(a[i]==a[j])
            {
                return 1;
            }
        }
    }
    return 0;
}

void checa(ma *a, int *b, int c, int d, int e, int *f)
{
    int i;
    for (i=0;i<e;i++)
    {
        if(d+(c*(*a).m) == b[i])
        {
            printf("Você estourou uma mina\n");
            *f=2;
        }
        else
        {
            abre( a , b , c , d , e );
        }
    }
}

void abre(ma *a, int *b, int c, int d, int e)
{
    int i;
    int q=48;
    for (i=0;i<e;i++)
    {
        if(((d+1)<=(*a).n)&&((c+1)<=(*a).m)&&((d+1)+((c+1)*(*a).m)==b[i]))
        {
            q++;
        }
        if(((c+1)<=(*a).m)&&(d+((c+1)*(*a).m)==b[i]))
        {
            q++;
        }
        if(((d-1)>=0)&&((c+1)<=(*a).m)&&((d-1)+((c+1)*(*a).m)==b[i]))
        {
            q++;
        }
        if(((d+1)<=(*a).n)&&((d+1)+(c*(*a).m)==b[i]))
        {
            q++;
        }
        if(((d-1)>=0)&&((d-1)+(c*(*a).m)==b[i]))
        {
            q++;
        }
        if(((c-1)>=0)&&(d+((c-1)*(*a).m)==b[i]))
        {
            q++;
        }
        if(((d+1)<=(*a).n)&&((c-1)>=0)&&((d+1)+((c-1)*(*a).m)==b[i]))
        {
            q++;
        }
        if(((d-1)>=0)&&((c-1)>=0)&&((d-1)+((c-1)*(*a).m)==b[i]))
        {
            q++;
        }

    }
    (*a).f[d+(*a).m*c]=q;
    if(!(q-48))
    {
        if((c-1!=-1) && (d+1!=(*a).n) && ((*a).f[d+1+(*a).m*(c-1)]!='0' ))
        {
            abre( a , b , c-1 , d+1 , e );
        }
        if((c-1!=-1) && (d-1!=-1) && ((*a).f[d-1+(*a).m*(c-1)]!='0'))
        {
            abre( a , b , c-1 , d-1 , e );
        }
        if((c-1!=-1) && ((*a).f[d+(*a).m*(c-1)]!='0' ))
        {
            abre( a , b , c-1,d, e);
        }
        if((d+1!=(*a).n) && ((*a).f[d+1+(*a).m*c]!='0'))
        {
            abre( a , b , c , d+1 , e );
        }
        if((d-1!=-1) && ((*a).f[d-1+(*a).m*c]!='0'))
        {
            abre( a , b , c , d-1 , e );
        }
        if((c+1!=(*a).m) && (d-1!=-1) && ((*a).f[d-1+(*a).m*(c+1)]!='0'))
        {
            abre( a , b , c+1, d-1, e);
        }
        if((c+1!=(*a).m) && (d+1!=(*a).n) && ((*a).f[d+1+(*a).m*(c+1)]!='0'))
        {
            abre(a, b , c+1, d+1, e );
        }
        if((c+1!=(*a).m) && ((*a).f[d+(*a).m*(c+1)]!='0'))
        {
            abre(a, b , c+1, d, e);
        }
    }
}

int vit(ma a, int e)
{
    int i,j,k;
    k=j=0;
    for (i=0;i<a.m*a.n;i++)
    {
        if (a.f[i]== '?')
        {
            k++;
        }
        if ((a.f[i]== 'X')&&(a.f[i]!= '?'))
        {
            j++;
            break;
        }

    }
    if(!(j) && (k==e) )
    {
        return 1;
    }
    else
    {
        return 0;
    }
    return 0;
}












