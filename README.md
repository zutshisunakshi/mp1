# mp1       
## Requirements         
#### Application         
Web application will include 3 pages, (pulled from your Github account) (grads need to add some CSS    
and formatting)
	1. index page - A welcome page that has links to the gallery and submit page
	2. gallery page (reads your database and retrieves all of the before and after pictures)
		a. You will need to access your database via the AWS language SDK of your choice
		b. http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html
		c. http://docs.aws.amazon.com/aws-sdk-php/v3/api/
		d. http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.Rds.RdsClient.html
	3. submit page (form) (upon submission of the form, images are placed in an S3 bucket, and a URL
and information relating to that job is entered). The image is run through an image
manipulation library and a black and white version or thumbnail is generated (your choice)
programming language of your choice. The form contents are listed in the schema at the end of
the document.   

#### Infrastructure         
	1. Load Balancer with sticky-bits
	2. AutoScaling group (desired state 3 EC2 instances) w/Launch configuration
		a. Using: --iam-instance-profile
		b. http://docs.aws.amazon.com/cli/latest/reference/ec2/run-instances.html
	3. 1 RDS instance (your choice) (to store URLs and job status) See schema below:
	4. S3 Bucket for storing before (pre-processing)
	5. S3 Bucket for storing after (post-processing)     

#### Variables         
Variables needed to launch on my own account must be passed by positional parameters and details
mentioned in the ReadMe.md      
