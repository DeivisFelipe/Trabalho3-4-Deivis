def substitute_badwords(pkt):
    with open("badwords.txt", "rb") as file:
        for word in file.readlines():
            if word[:len(word) - 1] == b"Deivis":
                print("OI")

substitute_badwords(None)
