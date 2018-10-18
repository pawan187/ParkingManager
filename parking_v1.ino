
/*
esp8266 module import
*/

#include <ESP8266WiFi.h>
String apiKey = "89EYM3ETN7J1ORNL";
const char *ssid = "SN-WS";
const char *pass = "vishal@123";
const char *server = "api.thingspeak.com";
int irInput = 5;
int val=0;

WiFiClient client;
// the setup function runs once when you press reset or power the board
void setup() {
  Serial.begin(115200);
  // initialize digital pin LED_BUILTIN as an output.
  pinMode(13, OUTPUT);
  pinMode(irInput, INPUT);
  Serial.println("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, pass);
    while (WiFi.status() != WL_CONNECTED) 
     {
            delay(500);
            Serial.print(".");
     }
      Serial.println("");
      Serial.println("WiFi connected");
}

// the loop function runs over and over again forever
void loop() {
   val = digitalRead(irInput); // read input value 
   if (val == HIGH)
   { // check if the input is HIGH

      digitalWrite(13, HIGH); // turn LED on       
      if (client.connect(server,80))   //   "184.106.153.149" or api.thingspeak.com
      {    String postStr = apiKey;
                             postStr +="&field1=";
                             postStr += String(!val);
                             postStr += "\r\n\r\n";
           client.print("POST /update HTTP/1.1\n");
                             client.print("Host: api.thingspeak.com\n");
                             client.print("Connection: close\n");
                             client.print("X-THINGSPEAKAPIKEY: "+apiKey+"\n");
                             client.print("Content-Type: application/x-www-form-urlencoded\n");
                             client.print("Content-Length: ");
                             client.print(postStr.length());
                             client.print("\n\n");
                             client.print(postStr);
                             Serial.println("%s Send to Thingspeak:"+postStr);
                        }
          client.stop();
          Serial.println("Waiting...");
   } 
   else 
   {
    
      digitalWrite(13, LOW); // turn LED OFF 
    if (client.connect(server,80))   //   "184.106.153.149" or api.thingspeak.com
      {    String postStr = apiKey;
                             postStr +="&field1=";
                             postStr += String(!val);
                             postStr += "\r\n\r\n";
           client.print("POST /update HTTP/1.1\n");
                             client.print("Host: api.thingspeak.com\n");
                             client.print("Connection: close\n");
                             client.print("X-THINGSPEAKAPIKEY: "+apiKey+"\n");
                             client.print("Content-Type: application/x-www-form-urlencoded\n");
                             client.print("Content-Length: ");
                             client.print(postStr.length());
                             client.print("\n\n");
                             client.print(postStr);
                             Serial.println("%. Send to Thingspeak :"+postStr);
                        }
          client.stop();
 
          Serial.println("Waiting...");
   } 
  
}
