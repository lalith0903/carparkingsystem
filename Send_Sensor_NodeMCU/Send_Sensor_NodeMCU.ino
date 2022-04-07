#ifdef ESP8266
#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#elif defined(ESP32)
#include <WiFi.h>
#include <ESPmDNS.h>
#else
#error "Board not found"
#endif

#include <WebSocketsServer.h>

#include <ArduinoJson.h>
#include <Ticker.h> //https://github.com/sstaub/Ticker

#include <Servo.h>

Servo myservo;

#define ir_enter 12 ///
#define ir_back 13 //

int flag1 = 0,flag2 = 0;
int slot = 4;

void send_sensor();
Ticker timer;

char webpage[] PROGMEM = R"=====(

<!DOCTYPE html>
<html>

<script>

var connection = new WebSocket('ws://'+location.hostname+':81/');

var button_1_status = 0;
var button_2_status = 0;
var sens1_data = 0;
var sens2_data = 0;
var sens3_data = 0;
var sens4_data = 0;

connection.onmessage = function(event){

  var full_data = event.data;
  console.log(full_data);
  var data = JSON.parse(full_data);
  sens1_data = data.sens1;
  sens2_data = data.sens2;
  sens3_data = data.sens3;
  sens4_data = data.sens4;
  document.getElementById("sensor1_meter").value = Math.abs(1-sens1_data);
  document.getElementById("sensor1_value").innerHTML = Math.abs(1-sens1_data);
  document.getElementById("sensor2_meter").value = Math.abs(1-sens2_data);
  document.getElementById("sensor2_value").innerHTML = Math.abs(1-sens2_data);
  document.getElementById("sensor3_meter").value = Math.abs(1-sens3_data);
  document.getElementById("sensor3_value").innerHTML = Math.abs(1-sens3_data);
  document.getElementById("sensor4_meter").value = Math.abs(1-sens4 _data);
  document.getElementById("sensor4_value").innerHTML = Math.abs(1-sens4_data);
}
function button_1_on()
{
   button_1_status = 1; 
  console.log("LED 1 is ON");
  send_data();
}

function button_1_off()
{
  button_1_status = 0;
console.log("LED 1 is OFF");
send_data();
}

function button_2_on()
{
   button_2_status = 1; 
  console.log("LED 2 is ON");
  send_data();
}

function button_2_off()
{
  button_2_status = 0;
console.log("LED 2 is OFF");
send_data();
}

function send_data()
{
  var full_data = '{"LED1" :'+button_1_status+',"LED2":'+button_2_status+'}';
  connection.send(full_data);
}


</script>
<body>

<center>
<h1> Parking Slots Available </h1>

<!-- <h3> LED 1 </h3>
<button onclick= "button_1_on()" >On</button><button onclick="button_1_off()" >Off</button>
<h3> LED 2 </h3>
<button onclick="button_2_on()">On</button><button onclick="button_2_off()">Off</button>
</center> -->

<div style="text-align: center;">
<h3>Slot - 1</h3><meter value="0" min="0" max="1" id="sensor1_meter"> </meter> <h3 id="sensor1_value" style="display: inline-block;"> 2 </h3>
<br>
<h3>Slot - 2</h3><meter value="0" min="0" max="1" id="sensor2_meter"> </meter><h3 id="sensor2_value" style="display: inline-block;"> 2 </h3>
<br>
<h3>Slot - 3</h3><meter value="0" min="0" max="1" id="sensor3_meter"> </meter><h3 id="sensor3_value" style="display: inline-block;"> 2 </h3>
<br>
<h3>Slot - 4</h3><meter value="0" min="0" max="1" id="sensor4_meter"> </meter><h3 id="sensor4_value" style="display: inline-block;"> 2 </h3>

</body>
</html>
)=====";

// ipaddress/led1/on
//ipaddress/led1/off

// ipaddress/led2/on
//ipaddress/led2/off
#include <ESPAsyncWebServer.h>

AsyncWebServer server(80); // server port 80
WebSocketsServer websockets(81);

void notFound(AsyncWebServerRequest *request)
{
  request->send(404, "text/plain", "Page Not found");
}


void webSocketEvent(uint8_t num, WStype_t type, uint8_t * payload, size_t length) {

  switch (type) 
  {
    case WStype_DISCONNECTED:
      Serial.printf("[%u] Disconnected!\n", num);
      break;
    case WStype_CONNECTED: {
        IPAddress ip = websockets.remoteIP(num);
        Serial.printf("[%u] Connected from %d.%d.%d.%d url: %s\n", num, ip[0], ip[1], ip[2], ip[3], payload);
      }
      break;
    case WStype_TEXT:
      Serial.printf("[%u] get Text: %s\n", num, payload);
      String message = String((char*)( payload));
      Serial.println(message);

      
     DynamicJsonDocument doc(200);
    // deserialize the data
    DeserializationError error = deserializeJson(doc, message);
    // parse the parameters we expect to receive (TO-DO: error handling)
      // Test if parsing succeeds.
  if (error) {
    Serial.print("deserializeJson() failed: ");
    Serial.println(error.c_str());
    return;
  }

  //int LED1_status = doc["LED1"];
  //int LED2_status = doc["LED2"];
  //digitalWrite(LED1,LED1_status);
  //digitalWrite(LED2,LED2_status);




  }
}

void setup(void)
{
  
  Serial.begin(115200);
  WiFi.softAP("techiesms", "");
  Serial.println("softap");
  Serial.println("");
  Serial.println(WiFi.softAPIP());

  pinMode(ir_enter, INPUT);
  pinMode(ir_back, INPUT);

  myservo.attach(15);


  if (MDNS.begin("ESP")) { //esp.local/
    Serial.println("MDNS responder started");
  }



  server.on("/", [](AsyncWebServerRequest * request)
  { 
   
  request->send_P(200, "text/html", webpage);
  });


  server.onNotFound(notFound);

  server.begin();  // it will start webserver
  websockets.begin();
  websockets.onEvent(webSocketEvent);
  timer.attach(0.5,send_sensor);
  pinMode(D5,INPUT);
  pinMode(D4,INPUT);
  pinMode(D3,INPUT);
  pinMode(D2,INPUT);

}


void loop(void)
{
 websockets.loop();
 if (slot > 0) {
   if(digitalRead (ir_enter) == LOW && flag1==0){
    if(slot>0){flag1=1;
    if(flag2==0){myservo.write(180); slot = slot-1;}
    }
    }
    
    if(digitalRead (ir_back) == LOW && flag2==0){flag2=1;
    if(flag1==0){myservo.write(180); slot = slot+1;}
    }
    
    if(flag1==1 && flag2==1){
    delay (1000);
    myservo.write(180);
    flag1=0, flag2=0;
    }
 }
  
  delay(5000);
  myservo.write(0);
}

void send_sensor()
{
   int sens1 = digitalRead(D2);
   int sens2 = digitalRead(D3);
   int sens3 = digitalRead(D4);
   int sens4 = digitalRead(D5);
   
  // JSON_Data = {"temp":t,"hum":h}"
  String JSON_Data = "{\"sens1\":";
         JSON_Data += sens1;
         JSON_Data += ",\"sens2\":";
         JSON_Data += sens2;
         JSON_Data += ",\"sens3\":";
         JSON_Data += sens3;
         JSON_Data += ",\"sens4\":";
         JSON_Data += sens4;
         JSON_Data += "}";
   Serial.println(JSON_Data);     
  websockets.broadcastTXT(JSON_Data);
} 
