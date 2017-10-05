# ausvoting
Our platform, Australia Votes, bridges the gap between the needs of modern elections and the digital space. Using innovative technology, secure infrastructure design and robust threat mitigation strategies our talented team, largely consisting of Cyber Security professionals, have developed the secure and reliable online voting system that Australia needs.

Our system accurately records, and securely stores voting data anonymously in a distributed blockchain-based network which ensures availability and immutability throughout the voting process. It is extremely easy to scale, whether it be a local council election or a federal election to decide the future of our nation, by simply deploying more instances of the server image.

Our final product can be seen at https://ausvoting.ddns.net/

To give it a test drive, browse to https://ausvoting.ddns.net/register.php and create an account to log in with. (The actual product assumes that accounts are pre-registered according to real people's identities, therefore there are no links to it but for the purpose of this demo I included the function for you to create your own).

What is this repository for?

Quick summary - University Project
Target audiences - Registered Australian voters interested in simplyfying and making the entire voting process more convenient
Version - 2.0

How do I get set up?
  * Setup Apache, PHP and MySQL on a unix web server
  * Enable HTTPS with either a self-signed certificate or from https://certbot.eff.org/
  * Setup the MySQL server
  * Install the MultiChain client and follow the steps at https://www.multichain.com/getting-started/
  * git clone https://github.com/harambwan/ausvoting.git into the web directory ('/var/www/html')
  * Configure the data in includes/psl-config.php to your MySQL credentials
  * Configure the JSON RPC settings in includes/process_vote.php and includes/countvotes.php to point to the local MultiChain client's credentials


Dependencies

Database configuration --- Database developers to elaborate on (explain what databases have been created)

How to run tests ---- Security analysts to expand upon

Deployment instructions --- dependent on user desire

Referenced source material — licenses.txt file details any used graphics, with additionally referenced source code both in the file and within the program code

Contribution guidelines

Contributions are always more than welcome, no matter how big or small, just ensure you obey the following guidelines

Feel free to experiment with open issues, or sift through the program code and identify your own potential solutions of the application

Preferably through email, talk about a feature you would like to see or implement/fix, and why you believe it's necessary in AusVoting.

If approved, make sure an accompanying bitBucket issue is created detailing the discussion.
As soon as I contact you with direct approval, feel free to contribute as soon as you are ready.
Alternatively, anything I have personally listed as an issue is free to amend for the community, so feel free to amend any of these issues whenever

Please also observe the following: No reformatting No changing files that are not specific to the feature. Test your changes before uploading Prepare commits All code should compile without errors or warnings. All tests should be passing. Do not re-format code you were not approved upon.

Once you feel it is ready, submit the pull your pull request and I will analyse if the changes are appropriate are functional.

In the pull request, outline what you did and pinpoint the issues that you resolved/prevented
Once the pull request is in, please do not close the pull request (unless of course something is wrong with it).
There will definitely be feedback for you regarding your contribution, or possibly to fix or change some things in your push request, so please be aware of this feedback.

If you do these things, it will be make evaluation and acceptance easy, so please do these things :)


Who do I talk to?

Members of development team with contact emails:
Aaron Robertson (raaron@deakin.edu.au)
James Ward-Smith
James Terrence Blenkinsop
Damien Eden
Jordy Stewart (Jordan_Stewart@hotmail.com.au)
Ryan rodrigues
Shuchen Yang
Colby clayton


