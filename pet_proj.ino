
#include <SPI.h>
#include <Servo.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xBA, 0xBE };
EthernetClient client;
Servo servo1;
Servo servo2;

int HTTP_PORT = 80;
String HTTP_METHOD = "GET";
char HOST_NAME[] = "192.168.12.11";
String PATH_NAME = "/main/ethernet/led_bd.php";
String valor;
int led1 = 2;
char data;
int i, s1 = 0, s2 = 0;

void setup() {
  Serial.begin(9600);

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Erro ao obter um endereço IP via DHCP");
    while (true)
      ;
  }
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  servo2.attach(6);
  servo1.attach(7);
}

void loop(){
  painel();
}

void painel() {
  String valor = "?valor1=561972";  // Devem ser 6 números a partir do 1.

  if (client.connect(HOST_NAME, HTTP_PORT)) {
    Serial.println("Connected to server");

    client.println(HTTP_METHOD + " " + PATH_NAME + valor + " HTTP/1.1");
    client.println("Host: " + String(HOST_NAME));
    client.println("Connection: close");
    client.println();

    while (client.connected()) {
      if (client.available()) {
        data = client.Read();
      }
    }

    client.stop();
    Serial.print(data);
    switch (data) {
      case 'a': for(i=s1;   i<=180; i++){ servo1.write(i); delay(50); } 
      break;
      case 'b': for(i=180; i>=0;   i--){ servo1.write(i); delay(50); } 
      break; 
      case 'c': for(i=s2;   i<=180; i++){ servo2.write(i); delay(50); } 
      break;
      case 'd': for(i=180; i>=0;   i--){ servo2.write(i); delay(50); }
      break;
      case 'e': digitalWrite(led1, 1);
      break;
      case 'f': digitalWrite(led1, 0); 
      break;
    }
    data = ' ';
    Serial.println();
    Serial.println("Desligado.");

  } else Serial.println("Erro ao conectar.");

  delay(3000);
}


