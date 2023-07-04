import socket

IP_dest = '10.1.1.1'
IP_orig = '10.1.1.2'

file_name = 'lotr.txt'

def main():
    with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
        s.connect(('8.8.8.8', 8881))
        with open("lotr.txt", "rb") as file:
            data = file.read(1000)
            s.sendall(data)

if __name__ == '__main__':
    main()