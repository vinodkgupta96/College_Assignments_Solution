
%include "io.mac"

.DATA
prompt_msg1  db   "Please input n numbers to do sum of : ",0
prompt_msg2  db   "Please input the number : ",0
output_msg3   db   "The Sum is :",0
output_msg4   db   "The Mean is :",0
output_msg5   db   "The Variance is :",0
n1          dw      25159
n2          dw      25130
.UDATA 
number1   resd   1 
number2   resd   1

.CODE
      .STARTUP
      PutStr  prompt_msg1   ; request first number 
      GetInt CX             ; CX= n  
      mov AX, 0		    ; store 0 in the accumulator
      mov BX, 0		    ; Set the couter to 0
      mov word [n1],0
      mov word [n2],0
      
Loop_begin:   CMP BX,CX
	      JE Loop_End 
	      PutStr prompt_msg2   ; request number to sum
	      GetInt DX            ; DX= second number  
              
              
	      add word [n1], DX
              mov AX,DX
              mul AX
              add word [n2] ,AX
	      add BX, 1
	      jmp Loop_begin      
Loop_End:     PutStr  output_msg3  
  		PutInt  word [n1]
		nwln
	      PutStr output_msg4
              mov AX,[n1]
     	      mov DX,0
	      div BX
	      PutInt AX
              nwln
              PutStr output_msg5
mov word AX,[n2]
mul BX

mov CX,AX
mov word AX,[n1]            
mul AX

sub CX,AX
mov AX,CX
mov CX,AX
mov AX,BX
;sub BX,1
mul BX
mov BX,AX
mov AX,CX
div BX

   
              PutInt AX
     
     nwln
done:
      .EXIT
