protoc --proto_path=protos --php_out=src/protos --grpc_out=src/protos --plugin=protoc-gen-grpc=/opt/git-clones/grpc/cmake/build/grpc_php_plugin ./protos/cc_service.proto
