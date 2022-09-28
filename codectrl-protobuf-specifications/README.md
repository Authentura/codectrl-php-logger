# CodeCtrl Protobuf Files

This repository contains the files that define the communication between the
CodeCtrl language loggers and the CodeCtrl log server that runs in the
background. This repository is intended to be used as a submodule for each
language logger to use to build against.

gPRC-specific documentation for most languages can be seen
[here](https://grpc.io/docs/languages/), though not all languages are listed.
Rust has [tonic](https://crates.io/crates/tonic) which is what is being used
inside CodeCtrl and works more than well enough. C has
[juniper/gprc-c](https://github.com/juniper/grpc-c), but it seems unmaintained,
may be worth using the main gPRC repo and using the core library instead as
mentioned in the [table under this heading in the main
repository](https://github.com/grpc/grpc#about-this-repository).
