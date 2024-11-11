' File: convert.vbs

Dim args, inputFile, outputFile
Set args = WScript.Arguments

If args.Count <> 2 Then
    WScript.Echo "Usage: cscript convert.vbs <input_word_file> <output_pdf_file>"
    WScript.Quit 1
End If

inputFile = args(0)
outputFile = args(1)

Dim word
Set word = CreateObject("Word.Application")
word.Visible = False

Dim doc
Set doc = word.Documents.Open(inputFile)

doc.SaveAs2 outputFile, 17 ' 17 corresponds to wdFormatPDF

doc.Close False
word.Quit

WScript.Echo "Converted " & inputFile & " to " & outputFile
