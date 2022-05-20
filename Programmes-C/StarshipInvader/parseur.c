#include <stdio.h>
#include <stdlib.h>

FILE* fp;
int main() {
	
	errno_t err;

	err = fopen_s(&fp,"./json.json", "r+");


	fclose(&fp); 

	return(0);
}
