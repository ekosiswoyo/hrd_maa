Hello {{ $fptkMail->receiver }},
This is a demo email for testing purposes! Also, it's the HTML version.
 
Demo object values:
 
Demo One: {{ $fptkMail->demo_one }}
Demo Two: {{ $fptkMail->demo_two }}
 
Values passed by With method:
 
testVarOne: {{ $testVarOne }}
testVarOne: {{ $testVarOne }}
 
Thank You,
{{ $fptkMail->sender }}