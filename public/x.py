import os
import sys
import base64
import requests
import json

def word_to_pdf(input_file, output_file):
    # Your ConvertAPI secret
    api_secret = 'qRgDfO7EAIXZhKtl'  # Replace with your actual API secret

    # ConvertAPI URL
    url = f'https://v2.convertapi.com/convert/doc/to/pdf?Secret={api_secret}'

    # Read the input file and encode it to Base64
    with open(input_file, 'rb') as file:
        encoded_file_content = base64.b64encode(file.read()).decode('utf-8')

    # Create the payload for the POST request
    payload = {
        "Parameters": [
            {
                "Name": "File",
                "FileValue": {
                    "Name": os.path.basename(input_file),
                    "Data": encoded_file_content
                }
            }
        ]
    }

    # Send the POST request with the JSON payload
    headers = {'Content-Type': 'application/json'}
    response = requests.post(url, headers=headers, data=json.dumps(payload))
    
    if response.status_code == 200:
        # Extract the PDF file from the response
        pdf_url = response.json()['Files'][0]['Url']
        pdf_response = requests.get(pdf_url)
        
        # Save the PDF file
        with open(output_file, 'wb') as pdf_file:
            pdf_file.write(pdf_response.content)
        
        print(f"Converted {input_file} to {output_file}")
    else:
        print("Failed to convert file")
        print(response.text)

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python3 x.py <input_word_file>")
        sys.exit(1)

    input_word_file = sys.argv[1]
    output_pdf_file = os.path.splitext(input_word_file)[0] + '.pdf'
    word_to_pdf(input_word_file, output_pdf_file)
