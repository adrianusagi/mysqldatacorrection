# mysqldatacorrection

Is a mini tool to correct MySQL data usually becomes a problem when restoring the database to a new machine

## What it is do ?
What is this tool doing is only doing update data in this list
1. Update empty string data to NULL
2. Update 0000-00-00 date data to NULL
