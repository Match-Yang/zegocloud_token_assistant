/**
 * Basic authentication token generation example
 */

const { generateToken04 } = require("./server/zegoServerAssistant");

// Please modify appID to your appId, appid is a number
// Example: 1234567890
const appID = 3417014186; // type: number

// Please modify serverSecret to your serverSecret, serverSecret to string
// Example: 'sdfsdfsd323sdfsdf'
const serverSecret = ""; // type: 32 byte length string

// Please modify userId to the user's userId
const userID = "user1"; // type: string
const userName = "user1_name";
const roomID = "test";
const effectiveTimeInSeconds = 3600; //type: number; unit: s; token expiration time, unit: seconds

//When generating a basic authentication token, the payload should be set to an empty string
const payload = "";
// Build token
const token =
  generateToken04(
    appID,
    userId,
    serverSecret,
    effectiveTimeInSeconds,
    payload
  ) +
  "#" +
  Buffer.from(JSON.stringify({ userID, roomID, userName, appID })).toString(
    "base64"
  );

console.log("token:", token);
