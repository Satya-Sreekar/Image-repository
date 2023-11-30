import os

def get_css_and_php_files(directory):
  """Returns a list of all CSS and PHP files in the given directory."""
  files = []
  for filename in os.listdir(directory):
    if filename.endswith(".css") or filename.endswith(".php"):
      files.append(filename)
  return files

def write_file_contents_to_text_file(filename, text_file):
  """Writes the contents of the given file to the given text file."""
  with open(filename, "r") as f:
    contents = f.read()
    text_file.write(f"{filename}\n\n{contents}\n\n")

def main():
  """Writes the name and contents of all CSS and PHP files in the current directory to a text file called output.txt."""
  directory = os.getcwd()
  css_and_php_files = get_css_and_php_files(directory)

  with open("output.txt", "w") as text_file:
    for filename in css_and_php_files:
      write_file_contents_to_text_file(filename, text_file)

if __name__ == "__main__":
  main()
