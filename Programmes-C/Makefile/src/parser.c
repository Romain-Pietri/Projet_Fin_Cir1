#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include "generateur.h"
#include <time.h>
/*
tranforme les char en int
*/
int charToInt(char c){
    if(c>='0' && c<='9'){
        return c-'0';
    }
    return -1;
}

/*
Ouvre le fichier ./json.json et affiche son contenu
*/
void printJson(char* filename){
    FILE* fd = fopen(filename, "r");
    if (fd == NULL) {
        printf("Erreur d'ouverture du fichier %s\n", filename);
        exit(EXIT_FAILURE);
    }
    char c;
    while ((c = fgetc(fd)) != EOF) {
        printf("%c", c);
    }
    fclose(fd);
}
/*
Ouvre le fichier ./json.json et renvoie son contenu
*/
char* readJson(char* filename){
    FILE* fd = fopen(filename, "r");
    if (fd == NULL) {
        printf("Erreur d'ouverture du fichier %s\n", filename);
        exit(EXIT_FAILURE);
    }
    char c;
    char* json = malloc(sizeof(char)*187);
    int i=0;
    while ((c = fgetc(fd)) != EOF) {
        json[i]=c;
        i++;
    }
    json[i]='\0';
    fclose(fd);
    return json;
}
/*
Ouvre le fichier ./json.json et écrit
*/
void writeJson(char* filename, Grille *g,int verif){
    FILE* fd = fopen(filename, "w");
    if (fd == NULL) {
        printf("Erreur d'ouverture du fichier %s\n", filename);
        exit(EXIT_FAILURE);
    }
    fprintf(fd, "{\"tableau\":[[");
    for(int i=0;i<8;++i){
        for(int j=0;j<8;++j){
            fprintf(fd, "%d", g->tab[i][j]+1);
            if(j!=8-1){
                fprintf(fd, ",");
            }
        }
        if(i!=8-1){
            fprintf(fd, "],[");
        }
    }
    fprintf(fd, "]],\"length\":%d,\"request\":1,\"id\":0,\"verif\":%d}",g->taille,verif);
    fclose(fd);
}
/*
récupere les info dans le char et les stock au endroit convenu
*/
void recup(char *chaine, int tab[8][8],int *taille,int *id , int *request){

    *request=charToInt(chaine[178]);
    if(request ==0){return;}
    int i=0;
    int j=0;
    for(int k=13;k<154; ++k){
        if(chaine[k]==']'){
            i=0;
            j++;
        }
        if(chaine[k]>='0' && chaine[k]<='9'){
            tab[i][j]=charToInt(chaine[k])-1;
            i++;
        }
    }
    *taille=charToInt(chaine[166]);
    *id=charToInt(chaine[185]);
}

/*
affiche un tableau 8*8
*/
void affiche(int tab[8][8]){
    for(int i=0;i<8;++i){
        for(int j=0;j<8;++j){
            printf("%3d ",tab[i][j]);
        }
        printf("\n");
    }
}
int main(){
    //printJson("./json.json");
    //writeJson("./test.json",GenerateGrid(4));
    int tab[8][8];
    int taille;
    int id;
    int request;
    char *chaine = readJson("../json.json");
    recup(chaine,tab,&taille,&id,&request);
    if(request==0 || request==1){
        /*
        Id = 0 generate
        Id = 1 solve
        Id = 2 Indice ( intéligent)
        Id = 4 Verif ( random)
        */
        if(id==0) writeJson("../json.json",GenerateGrid(taille),1);
        if(id==1) {
            Grille *g = Newgrille();
            initGrille(g, taille, tab);
            g=Resoudre(g);
            writeJson("../json.json",g,1);
            
            }
        if(id==2) { 
            Grille *g = Newgrille();
            initGrille(g, taille, tab);
            if(inteligent(g)) writeJson("../json.json",g,1);
            else{
                writeJson("../json.json",g,0);
            }
        }
        if(id==3) {
            Grille *g = Newgrille();
            initGrille(g, taille, tab);
            if(VerifGrille(g)) writeJson("../json.json",g,1);
            else{
                writeJson("../json.json",g,0);
            }
        }
    }
    return 0;
}