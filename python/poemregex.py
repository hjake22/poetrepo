import sys
import os
import re

class PoemStat:
    def __init__(self, title, author):
        self.title = title
        self.author = author
        self.total_lines = 0
        self.stanzas = 0

    def add_stats(self, lines):
        self.total_lines += lines
        self.stanzas += 1

    def avg_lines_per_stanza(self):
        if self.stanzas > 0:
            return self.total_lines / self.stanzas
        else:
            return 0.000

def main():
    if len(sys.argv) < 2:
        sys.exit(f"Usage: {sys.argv[0]} filename")

    filename = sys.argv[1]

    if not os.path.exists(filename):
        sys.exit(f"Error: File '{sys.argv[1]}' not found")

    poem_title = ""
    poem_author = ""
    poem_stats = None

    with open(filename, 'r') as f:
        poem_content = f.read()

        # Use regex to extract title and author
        title_match = re.search(r"^(.*)\n", poem_content)
        if title_match:
            poem_title = title_match.group(1).strip()

        author_match = re.search(r"by (.*)\n", poem_content)
        if author_match:
            poem_author = author_match.group(1).strip()

        if not poem_title or not poem_author:
            sys.exit("Error: Unable to extract title or author from the poem.")

        poem_stats = PoemStat(poem_title, poem_author)

        # Use regex to split the poem into stanzas
        stanzas = re.split(r"\n\s*\n", poem_content)
        for idx, stanza in enumerate(stanzas):
            if idx == 0:  # Skip the first stanza containing title and author
                continue

            lines = stanza.split("\n")
            if lines and lines[0]:  # Check if the stanza is not empty
                poem_stats.add_stats(len(lines))

    avg_lines_per_stanza = poem_stats.avg_lines_per_stanza()
    print(f"Title: {poem_stats.title}")
    print(f"Author: {poem_stats.author}")
    print(f"Line count: {poem_stats.total_lines}")
    print(f"Stanza count: {poem_stats.stanzas}")
    print(f"Avg lines per stanza: {avg_lines_per_stanza:.3f}")

if __name__ == "__main__":
    main()