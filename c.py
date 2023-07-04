import socket

IP_dest = '10.1.1.1'
IP_orig = '10.1.1.2'

file_name = 'lotr.txt'

def main():
    with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
        s.connect(('8.8.8.8', 8881))
        with open("lotr.txt", "rb") as file:
            while file.readable():
                data = file.read(1000)
                if not data:
                    break
                s.send(data)

if __name__ == '__main__':
    main()