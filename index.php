<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$Events = $json->result->parameters->Events;

	switch ($Events) {
		case 'Premiere':
			$speech = "Are you looking to book a virtual premiere or in person premiere?";
			break;

		case 'Virtual Premiere':
			$speech = "Great! Please find the next Virtual Premiere session by clicking here...";
			break;

		case 'In Person Premiere':
			$speech = "When booking in person premiere, you should speak to your manager or reach out to learning@gadventures.com";
			break;

		case 'Garage Band':
			$speech = "Please reach out wadek@gadventures.com or your regional Inside Sales Manager to book Garage Band.";
			break;

		case 'G Manager':
			$speech = "Looking to book G Manager? Please send an email to learning@gadventures.com";
			break;

		case 'Storytelling':
			$speech = "Are you looking to book Storytelling in your region? Please send an email to learning@gadventures.com";
			break;

		case 'Offsite':
			$speech = "Are you look for materials or facilitation for your offsite?";
			break;

		case 'Facilitation':
			$speech = "What kind of program are you looking to be facilitated?";
			break;

		case 'Materials':
			$speech = "What's the name of the program you need materials for?";
			break;

		case 'Support':
			$speech = "What kind of support do you need? Is it an issue with G Learning, a module issue?";
			break;

		case 'G Learning':
			$speech = "Are you having trouble registering into a module?";
			break;
		
		case 'Module Issue':
			$speech = "What seems to be the issue?";
			break;

		case 'Completion':
			$speech = "If a module isn't registering you complete, even though you've gone through it all, please open it back up and when it asks Would you like to resume where you left off? Select yes, and run through the module again until the end then make sure to CLOSE the window, it should then mark complete";
			break;

		case 'did that':
			$speech = "Interesting...I would send a ticket to learning@gadventures.com with a screenshot of the issue and they will look into it!";
			break;

		case 'Lynda.com':
			$speech = "Are you having trouble logging in to Lynda.com? If so, please make sure to sign in through g-nation.com NOT salesforce!";
			break;

		case 'Walkme':
			$speech = "How can I help you with WalkMe? Are you looking for something to be added to the Need Assistance tab, or are you looking to build a new WalkMe?";
			break;

		case 'Need Assistance tab':
			$speech = "If you're looking to get something added to the Need Assistance tab, that's no problem! Just send the resource you need added to learning@gadventures.com and the platform it needs to be added to.";
			break;

		case 'New Walkme':
			$speech = "Sure thing! Depending on what you need, it can be pretty straightforward or a bit more complex, I would recommend speaking to Mat Araujo about this.";
			break;

		case 'Animation':
			$speech = "Oh I love those animations! How can I help? Are you looking for one you've seen before, or are you looking to build a new animation?";
			break;

		case 'New Animation':
			$speech = "Neat! Our lovely eLearning team can help with any custom animations you need built, send an email over to learning@gadventures.com and they'll help you out!";
			break;

		case 'Consult':
			$speech = "The Learning team would LOVE to consult on your next big project! It really depends on who is available, but most of the Learning team specialize in certain topics. You can send a ticket to learning@gadventures.com, and the best person for the topic will reach out to you!";
			break;

		case 'Gauge':
			$speech = "Are you looking for materials on how to discuss the Gauge with your team? We have some materials that would be great to help you lead that conversation, you can access them HERE. But before you do, please make sure to book a meeting to discuss your plans with the G Force team.";
			break;

		case 'Assign New Learning':
			$speech = "To assign exsiting learning material to one of your team members in G Learning, simply click on the My Crew section of G Learning and go from there!";
			break;

		case 'Shutterbug';
			$speech = "Looking to enroll in Shutterbug? Look no further! Click on this link, https://gadventures--lmsilt.na79.visual.force.com/apex/lmsilt__eui_lodetails?objectId=a6e14000000GpRpAAK&tabName=catalog&parentObjectId=a6e14000000GpRpAAK&parentObjectName=COURSE:%20Shutterbug";
			break;

		case 'Product Padawan';
			$speech = "Looking to enroll in Product Padawan? Click on this link, https://gadventures--lmsilt.na79.visual.force.com/apex/lmsilt__eui_lodetails?objectId=a6e14000000WiAyAAK&tabName=catalog&parentObjectId=a6e14000000WiAyAAK&parentObjectName=COURSE:%20Product+Padawan";
			break;

		case 'G Adventures for Good':
			$speech = "Great! Here's the link! https://gadventures--lmsilt.na79.visual.force.com/apex/lmsilt__eui_lodetails?objectId=a6b14000000HNYtAAO&tabName=completed";
			break;

		case 'Manager Backpack':
			$speech = "Looking for the G Manager backpack, click on this link, https://gmanagerbackpack.com/";
			break;		

		default:
			$speech = "Sorry, I didnt get that. Are you looking for a specific event like Premiere, Garage Band, G Manager, Storytelling, or an Offsite?";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
